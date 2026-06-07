<?php
// app/Http/Controllers/CourseController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with('category.parent');

        if ($request->has('category')) {
            $category = Category::find($request->category);
            if ($category) {
                if ($category->parent_id) {
                    // Subcategory - show only its courses
                    $query->where('category_id', $category->id);
                } else {
                    // Main category - show courses from all subcategories
                    $subcategoryIds = $category->children->pluck('id');
                    $query->whereIn('category_id', $subcategoryIds);
                }
            }
        }

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $courses = $query->paginate(12);
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return Inertia::render('Courses/Index', [
            'courses' => $courses,
            'categories' => $categories,
            'filters' => $request->only(['search', 'category'])
        ]);
    }

    // app/Http/Controllers/CourseController.php
    public function show(Course $course)
    {
        $course->load(['category.parent', 'videos']); // Load videos with the course

        $enrollment = null;
        $isEnrolled = false;
        $enrollmentStatus = null;
        $courseVideos = []; // Renamed to avoid confusion

        if (auth()->check()) {
            $enrollment = auth()->user()->enrollments()
                ->where('course_id', $course->id)
                ->first();

            $isEnrolled = $enrollment && in_array($enrollment->status, ['pending', 'verified']);
            $enrollmentStatus = $enrollment ? $enrollment->status : null;

            // Load videos only for verified enrollment
            if ($enrollment && $enrollment->status === 'verified') {
                $courseVideos = $course->videos()
                    ->where('is_active', true)
                    ->orderBy('order')
                    ->get(['id', 'title', 'video_path', 'duration', 'order']);
            }
        }

        return Inertia::render('Courses/Show', [
            'course' => $course->loadCount('videos'), // Add this to count videos
            'isEnrolled' => $isEnrolled,
            'enrollmentStatus' => $enrollmentStatus,
            'enrollment' => $enrollment,
            'videos' => $courseVideos,
        ]);
    }
}
