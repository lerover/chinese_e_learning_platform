<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCategoryResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CourseCategory;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $courseCategories = CourseCategoryResource::collection(
            CourseCategory::query()
            ->when($request->q, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%');
            })
            ->paginate(10)
        );
        // return $courseCategories;
        return Inertia::render('admin/course-category/Index', [
            'courseCategories' => $courseCategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('admin/course-category/CreateEdit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        CourseCategory::create($validated);
        
        return redirect()->route('course-categories.index');
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
        $courseCategory = CourseCategory::find($id);
        return Inertia::render('admin/course-category/CreateEdit', [
            'courseCategory' => $courseCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $courseCategory = CourseCategory::find($id);
        $courseCategory->update($validated);
        return redirect()->route('course-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courseCategory = CourseCategory::find($id);
        $courseCategory->delete();
        return redirect()->route('course-categories.index');
    }
}
