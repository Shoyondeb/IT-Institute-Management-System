<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // if (auth()->user()->isAdmin()) {
        //     return redirect()->route('admin.dashboard');
        // }

        $enrolledCourses = auth()->user()->enrolledCourses()
            ->with('category.parent')
            ->latest()
            ->take(5)
            ->get();

        return Inertia::render('Dashboard', [
            'enrolledCourses' => $enrolledCourses
        ]);
    }
}
