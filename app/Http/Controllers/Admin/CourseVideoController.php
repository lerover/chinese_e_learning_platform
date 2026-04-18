<?php

namespace App\Http\Controllers\Admin;

use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Resources\CourseVideoResource;
use Illuminate\Support\Facades\Storage;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $course)
    {
        $courseVideos = CourseVideoResource::collection(
            CourseVideo::where('course_id', $course)
            ->when($request->q, function($query) use ($request) {
                $query->where('title', 'like', '%' . $request->q . '%');
            })
            ->get()
        );
        return Inertia::render('admin/course-video/Index', [
            'courseId' => $course,
            'courseVideos' => $courseVideos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($course)
    {
        return Inertia::render('admin/course-video/CreateEdit', [
            'courseId' => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'duration' => 'required|string',
            'video' => 'required|file|mimes:mp4,mov,wmv,avi|max:20480',
            'type' => 'required|in:free,premium',
        ]);



        $videoPath = $validated['video']->store('course-videos', 'public');
        $thumbnailPath = $validated['thumbnail']->store('course-thumbnails', 'public');
        
        // TODO: Create course video record in database
        CourseVideo::create([
            'course_id' => $course,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'video_url' => $videoPath,
            'thumbnail' => $thumbnailPath,
            'type' => $validated['type'],
        ]);
        
        return redirect()->route('videos.index', ['course' => $course]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $course, string $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $course, string $video)
    {
        $courseVideo = CourseVideo::findOrFail($video);

        return Inertia::render('admin/course-video/CreateEdit', [
            'courseId' => $course,
            'courseVideo' => $courseVideo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $course, string $video)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'sometimes|nullable|'. ($request->hasFile('thumbnail') ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'string'),
            'description' => 'required|string',
            'duration' => 'required|string',
            'video' => 'sometimes|nullable|'. ($request->hasFile('video') ? 'file|mimes:mp4,mov,wmv,avi|max:20480' : 'string'),
            'type' => 'sometimes|nullable|in:free,premium',
        ]);

        if($request->hasFile('video')){
            $videoPath = $validated['video']->store('course-videos', 'public');
        }else{
            $videoPath = null;
        }

        if($request->hasFile('thumbnail')){
            $thumbnailPath = $validated['thumbnail']->store('course-thumbnails', 'public');
        }else{
            $thumbnailPath = null;
        }
        $courseVideo = CourseVideo::findOrFail($video);
        // TODO: Create course video record in database
        $courseVideo->update([
            'course_id' => $course,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'duration' => $validated['duration'],
            'video_url' => $videoPath ? $videoPath : $courseVideo->video_url,
            'thumbnail' => $thumbnailPath ? $thumbnailPath : $courseVideo->thumbnail,
            'type' => $validated['type'] ?? $courseVideo->type,
        ]);
        
        return redirect()->route('videos.index', ['course' => $course]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $course, string $video)
    {
        $courseVideo = CourseVideo::findOrFail($video);
        Storage::disk('public')->delete($courseVideo->video_url);
        Storage::disk('public')->delete($courseVideo->thumbnail);
        $courseVideo->delete();
        return redirect()->route('videos.index', ['course' => $course]);
    }
}
