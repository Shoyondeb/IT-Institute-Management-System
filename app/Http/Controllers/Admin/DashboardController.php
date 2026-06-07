<?php
// app/Http/Controllers/Admin/DashboardController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalStudents' => User::where('role', 'student')->count(),
            'totalCourses' => Course::count(),
            'totalEnrollments' => Enrollment::count(),
            'recentEnrollments' => Enrollment::with(['user', 'course'])
                ->latest()
                ->take(5)
                ->get()
        ];

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats
        ]);
    }
}
