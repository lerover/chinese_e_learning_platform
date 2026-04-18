<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $courses = CourseResource::collection(Course::with('courseCategory')->
        when($request->q, function($query) use ($request) {
            $query->where('title', 'like', '%' . $request->q . '%');
        })
        ->paginate(10));

        // return $courses;
        return Inertia::render('admin/courses/Index', [
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseCategories = CourseCategory::get();
        return Inertia::render('admin/courses/CreateEdit', [
            'courseCategories' => $courseCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_category_id' => 'required|exists:course_categories,id',
            'price_per_month' => 'required|numeric',
            'courseData' => 'required|array',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $thumbnailPath = $validated['thumbnail']->store('courses', 'public');

        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'course_category_id' => $validated['course_category_id'],
            'price_per_month' => $validated['price_per_month'],
            'course_data' => $validated['courseData'],
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('admin-courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);
        $courseCategories = CourseCategory::get();
        return Inertia::render('admin/courses/CreateEdit', [
            'course' => $course,
            'courseCategories' => $courseCategories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'course_category_id' => 'required|exists:course_categories,id',
            'price_per_month' => 'required|numeric',
            'courseData' => 'required|array',
            'thumbnail' => 'sometimes|nullable|' . ($request->hasFile('thumbnail') ? 'image|max:2048' : 'string'),
        ]);

        $course = Course::find($id);
        
        if($request->hasFile('thumbnail')){
            // Delete old thumbnail if exists
            if($course->thumbnail){
                Storage::delete('public/' . $course->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('courses', 'public');
        }else{
            $thumbnailPath = null;
        }

        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'price_per_month' => $validated['price_per_month'],
            'course_category_id' => $validated['course_category_id'],
            'course_data' => $validated['courseData'],
            'thumbnail' => $thumbnailPath ? $thumbnailPath : $course->thumbnail,
        ]);
        
        return redirect()->route('admin-courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        Storage::disk('public')->delete($course->thumbnail);
        $course->delete();
        return redirect()->route('admin-courses.index');
    }
}
