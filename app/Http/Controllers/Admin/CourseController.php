<?php
// app/Http/Controllers/Admin/CourseController.php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Category;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->withVideosCount()->latest()->paginate(10);
        $categories = Category::whereNotNull('parent_id')->get();

        return Inertia::render('Admin/Courses/Index', [
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $subcategories = Category::whereNotNull('parent_id')->get();

        return Inertia::render('Admin/Courses/Create', [
            'categories' => $subcategories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:50',
            'fee' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $subcategories = Category::whereNotNull('parent_id')->get();

        return Inertia::render('Admin/Courses/Edit', [
            'course' => $course,
            'categories' => $subcategories
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:50',
            'fee' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image',
            'remove_image' => 'nullable|boolean'
        ]);

        // Handle image removal
        if ($request->has('remove_image') && $request->remove_image) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = null;
        }
        // Handle new image upload
        elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        // Keep existing image
        else {
            $validated['image'] = $course->image;
        }

        $course->update($validated);

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
    // app/Http/Controllers/Admin/CourseController.php
    public function videos(Course $course)
    {
        // Load course with its videos
        $course->load(['category', 'videos' => function ($query) {
            $query->orderBy('order')->orderBy('created_at');
        }]);

        return Inertia::render('Admin/Courses/Videos/Index', [
            'course' => $course,
            'videos' => $course->videos,
        ]);
    }

    // app/Http\Controllers/Admin/CourseController.php
    public function storeVideo(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4|max:102400', // 100MB
            'duration' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '_' . uniqid() . '.mp4';
            $path = $file->storeAs('public/course_videos', $filename);

            $video = CourseVideo::create([
                'course_id' => $course->id,
                'title' => $request->title,
                'video_path' => $filename,
                'duration' => $request->duration,
                'order' => $request->order ?? 0,
            ]);

            return response()->json([
                'message' => 'Video uploaded successfully!',
                'video' => $video
            ]);
        }

        return response()->json(['error' => 'No video file provided'], 400);
    }
}
