<?php
// app/Http/Controllers/Api/CourseVideoController.php
namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseVideoController extends Controller
{
    // Get all videos for a course
    public function index($courseId)
    {
        $course = Course::with('videos')->findOrFail($courseId);
        return response()->json([
            'course' => $course,
            'videos' => $course->videos
        ]);
    }

    // Store a new video
    // Store a new video
    public function store(Request $request, $courseId)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4|max:102400', // 100MB max
            'duration' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $course = Course::findOrFail($courseId);

        // Handle file upload
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store the file - FIXED: Remove 'public/' prefix
            $path = $file->storeAs('course_videos', $filename, 'public');

            $video = CourseVideo::create([
                'course_id' => $course->id,
                'title' => $request->title,
                'video_path' => 'course_videos/' . $filename, // FIXED: Store full relative path
                'duration' => $request->duration,
                'order' => $request->order ?? 0,
            ]);

            return response()->json([
                'message' => 'Video uploaded successfully!',
                'video' => $video
            ], 201);
        }

        return response()->json(['error' => 'No video file provided'], 400);
    }

    // Update video details
    public function update(Request $request, $courseId, $videoId)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'duration' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $video = CourseVideo::where('course_id', $courseId)
            ->findOrFail($videoId);

        $video->update($request->only(['title', 'duration', 'order', 'is_active']));

        return response()->json([
            'message' => 'Video updated successfully!',
            'video' => $video
        ]);
    }

    // Delete a video 
    public function destroy($courseId, $videoId)
    {
        $video = CourseVideo::where('course_id', $courseId)
            ->findOrFail($videoId);

        // Delete the physical file - FIXED: Use correct path
        Storage::disk('public')->delete($video->video_path);

        // Delete from database
        $video->delete();

        return response()->json([
            'message' => 'Video deleted successfully!'
        ]);
    }

    // Get video playback URL
    public function getVideoUrl($courseId, $videoId)
    {
        $video = CourseVideo::where('course_id', $courseId)
            ->findOrFail($videoId);

        $url = Storage::url('course_videos/' . $video->video_path);

        return response()->json(['url' => $url]);
    }
    // Add this method to your existing controller
    public function show($courseId, $videoId)
    {
        $video = CourseVideo::where('course_id', $courseId)
            ->with('course')
            ->findOrFail($videoId);

        return response()->json([
            'video' => $video,
            'url' => Storage::url('course_videos/' . $video->video_path)
        ]);
    }
}
