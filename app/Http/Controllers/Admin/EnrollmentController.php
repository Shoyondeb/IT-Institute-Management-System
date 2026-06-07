<?php
// app/Http/Controllers/Admin/EnrollmentController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course'])
            ->latest()
            ->paginate(10);

        return Inertia::render('Admin/Enrollments/Index', [
            'enrollments' => $enrollments
        ]);
    }

    public function verify(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'verified']);
        return back()->with('success', 'Payment verified!');
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);
        return back()->with('success', 'Payment rejected.');
    }
}
