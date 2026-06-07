<?php
// routes/web.php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Api\CourseVideoController;

Route::get('/', function () {
    return redirect('/login');
});

// Registration route - add this
Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->middleware('guest')->name('register');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('enrollments.enroll');
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('my-courses');

    // Admin Routes
    // In routes/web.php, update admin routes section:
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Courses
        Route::resource('/courses', AdminCourseController::class);

        // Video Management Page (Inertia - shows Vue page)
        Route::get('/courses/{course}/videos', [AdminCourseController::class, 'videos'])
            ->name('courses.videos.page');

        // Video API endpoints (JSON responses)
        Route::prefix('courses/{course}/videos')->name('courses.videos.')->group(function () {
            Route::get('/api/list', [CourseVideoController::class, 'index'])->name('list');
            Route::post('/api/upload', [CourseVideoController::class, 'store'])->name('store');
            Route::put('/api/{video}', [CourseVideoController::class, 'update'])->name('update');
            Route::delete('/api/{video}', [CourseVideoController::class, 'destroy'])->name('destroy');
        });

        // In admin routes section:
        Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
        Route::put('/enrollments/{enrollment}/verify', [AdminEnrollmentController::class, 'verify'])->name('enrollments.verify');
        Route::put('/enrollments/{enrollment}/reject', [AdminEnrollmentController::class, 'reject'])->name('enrollments.reject');
    });
});
// In routes/web.php or api.php
Route::get('/check-video/{filename}', function ($filename) {
    $path = storage_path('app/public/course_videos/' . $filename);

    if (file_exists($path)) {
        return response()->json([
            'exists' => true,
            'size' => filesize($path),
            'path' => $path
        ]);
    }

    return response()->json(['exists' => false], 404);
});
require __DIR__ . '/auth.php';
