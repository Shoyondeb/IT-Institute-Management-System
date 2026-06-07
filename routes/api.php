<?php
// routes/api.php
use App\Http\Controllers\Api\CourseVideoController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    // Course videos CRUD
    Route::prefix('courses/{course}/videos')->group(function () {
        Route::get('/', [CourseVideoController::class, 'index']);
        Route::post('/', [CourseVideoController::class, 'store']);
        Route::put('/{video}', [CourseVideoController::class, 'update']);
        Route::delete('/{video}', [CourseVideoController::class, 'destroy']);
        Route::get('/{video}/url', [CourseVideoController::class, 'getVideoUrl']);
    });
});
