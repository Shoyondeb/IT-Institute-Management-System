<?php
// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    public function enroll(Request $request, Course $course)
    {
        if (auth()->user()->enrollments()
            ->where('course_id', $course->id)
            ->whereIn('status', ['rejected'])
            ->exists()
        ) {
            // Validate payment details
            $validated = $request->validate([
                'payment_method' => 'required|in:bkash,nagad',
                'mobile_number' => 'required|string|max:20',
                'transaction_id' => 'required|string|max:50',
            ]);

            // Create enrollment - ONLY use columns that exist
            auth()->user()->enrollments()->create([
                'course_id' => $course->id,
                'payment_method' => $validated['payment_method'],
                'mobile_number' => $validated['mobile_number'],
                'transaction_id' => $validated['transaction_id'],
                'status' => 'pending',
                // REMOVED: 'submitted_at' => now(), // Column doesn't exist
            ]);

            return redirect()->route('dashboard')
                ->with('success', 'Enrollment submitted! Wait for admin verification.');
        }
        // Check if already enrolled
        if (auth()->user()->enrollments()
            ->where('course_id', $course->id)
            ->whereIn('status', ['pending', 'verified'])
            ->exists()
        ) {
            return back()->with('error', 'You are already enrolled or have a pending enrollment.');
        }

        // Validate payment details
        $validated = $request->validate([
            'payment_method' => 'required|in:bkash,nagad',
            'mobile_number' => 'required|string|max:20',
            'transaction_id' => 'required|string|max:50',
        ]);

        // Create enrollment - ONLY use columns that exist
        auth()->user()->enrollments()->create([
            'course_id' => $course->id,
            'payment_method' => $validated['payment_method'],
            'mobile_number' => $validated['mobile_number'],
            'transaction_id' => $validated['transaction_id'],
            'status' => 'pending',
            // REMOVED: 'submitted_at' => now(), // Column doesn't exist
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Enrollment submitted! Wait for admin verification.');
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
