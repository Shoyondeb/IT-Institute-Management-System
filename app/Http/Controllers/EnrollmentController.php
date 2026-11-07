<?php
// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Mail\EnrollmentPendingMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    public function enroll(Request $request, Course $course)
    {
        $user = auth()->user();

        // Check if already enrolled with pending or verified status
        if ($user->enrollments()
            ->where('course_id', $course->id)
            ->whereIn('status', ['pending', 'verified'])
            ->exists()
        ) {
            return back()->with('error', 'You are already enrolled or have a pending enrollment.');
        }

        // Check if previously rejected - allow re-enrollment
        if ($user->enrollments()
            ->where('course_id', $course->id)
            ->where('status', 'rejected')
            ->exists()
        ) {
            $user->enrollments()
                ->where('course_id', $course->id)
                ->where('status', 'rejected')
                ->delete();
        }

        // Validate payment details
        $validated = $request->validate([
            'payment_method' => 'required|in:bkash,nagad',
            'mobile_number' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:50',
        ]);

        // Create enrollment
        $enrollment = $user->enrollments()->create([
            'course_id' => $course->id,
            'payment_method' => $validated['payment_method'],
            'mobile_number' => $validated['mobile_number'],
            'transaction_id' => $validated['transaction_id'],
            'status' => 'pending',
            'notification' => true,
        ]);

        // ============= SEND EMAILS =============

        // 1. Send email to the user
        Mail::to($user->email)->send(new EnrollmentPendingMail($enrollment, $course, $user, false));

        // 2. Send email to admin (hardcoded admin email)
        Mail::to('shoyondeb18246@gmail.com')->send(new EnrollmentPendingMail($enrollment, $course, $user, true));

        // =======================================

        return redirect()->route('dashboard')
            ->with('success', 'Enrollment submitted! Please check your email for confirmation.');
    }

    public function myCourses()
    {
        $enrollments = auth()->user()->enrolledCourses()
            ->with('category.parent')
            ->withPivot('status', 'payment_method', 'mobile_number', 'transaction_id')
            ->paginate(10);

        return Inertia::render('Student/MyCourses', [
            'courses' => $enrollments
        ]);
    }
}
