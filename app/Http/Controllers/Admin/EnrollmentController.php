<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Mail\EnrollmentStatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Enrollment::with(['user', 'course']);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('course', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            });
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('payment_method') && $request->payment_method) {
            $query->where('payment_method', $request->payment_method);
        }

        $enrollments = $query->latest()->paginate(10)->withQueryString();

        Enrollment::where('notification', 1)->update(['notification' => 0]);

        return Inertia::render('Admin/Enrollments/Index', [
            'enrollments' => $enrollments,
            'filters' => $request->only(['search', 'status', 'payment_method']),
            'notificationCount' => Enrollment::where('notification', true)->count(),
        ]);
    }

    public function verify(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'verified']);

        // Send email to user
        Mail::to($enrollment->user->email)->send(
            new EnrollmentStatusMail($enrollment, $enrollment->course, $enrollment->user, 'verified')
        );

        return back()->with('success', 'Payment verified! Email sent to student.');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);

        // Send email to user
        Mail::to($enrollment->user->email)->send(
            new EnrollmentStatusMail($enrollment, $enrollment->course, $enrollment->user, 'rejected')
        );

        return back()->with('success', 'Payment rejected. Email sent to student.');
    }
}
