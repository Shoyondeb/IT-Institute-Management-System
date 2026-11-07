<?php
// routes/web.php

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnrollmentController as AdminEnrollmentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Api\CourseVideoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ============================================
// PUBLIC ROUTES (Using AuthenticatedLayout)
// ============================================

// Landing Page - Public View
Route::get('/', function () {
    return Inertia::render('Landing/Index');
})->name('landing.Index');

Route::get('/about', function () {
    return Inertia::render('Landing/About');
})->name("Landing.About");

Route::get("/Contact", function () {
    return Inertia::render('Landing/Contact');
})->name("Landing.Contact");

Route::get("/Courses/Show", function () {
    return Inertia::render('Landing/Courses/Show');
})->name("Landing.Courses.Show");


// Public Course Catalog (Viewable by everyone)
Route::get('/courses', [CourseController::class, 'publicIndex'])->name('courses.public.index');
Route::get('/courses/{course}', [CourseController::class, 'publicShow'])->name('courses.public.show');

// ============================================
// AUTHENTICATION ROUTES
// ============================================

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->middleware('guest')->name('register');

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest')->name('login');

// ============================================
// AUTHENTICATED ROUTES
// ============================================

Route::middleware('auth')->group(function () {
    // Student Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Course Routes
    Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('my-courses');
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('enrollments.enroll');

    // ============================================
    // ADMIN ROUTES
    // ============================================
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/courses', AdminCourseController::class);
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

        Route::get('/courses/{course}/videos', [AdminCourseController::class, 'videos'])->name('courses.videos.page');
        Route::prefix('courses/{course}/videos')->name('courses.videos.')->group(function () {
            Route::get('/api/list', [CourseVideoController::class, 'index'])->name('list');
            Route::post('/api/upload', [CourseVideoController::class, 'store'])->name('store');
            Route::put('/api/{video}', [CourseVideoController::class, 'update'])->name('update');
            Route::delete('/api/{video}', [CourseVideoController::class, 'destroy'])->name('destroy');
        });

        Route::get('/enrollments', [AdminEnrollmentController::class, 'index'])->name('enrollments.index');
        Route::put('/enrollments/{enrollment}/verify', [AdminEnrollmentController::class, 'verify'])->name('enrollments.verify');
        Route::put('/enrollments/{enrollment}/reject', [AdminEnrollmentController::class, 'reject'])->name('enrollments.reject');
    });
});

//Mail
Route::middleware('auth')->group(function () {
    Route::post('/contact', [ContactController::class, 'send'])
        ->name('contact.send');
});

// Video Check Route
Route::get('/check-video/{filename}', function ($filename) {
    $path = storage_path('app/public/course_videos/' . $filename);
    if (file_exists($path)) {
        return response()->json(['exists' => true, 'size' => filesize($path), 'path' => $path]);
    }
    return response()->json(['exists' => false], 404);
});

require __DIR__ . '/auth.php';
