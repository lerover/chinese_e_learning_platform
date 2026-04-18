<?php

namespace App\Http\Controllers;

use App\Http\Resources\EnrollmentResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\CourseEnrollMent;

class EnrollmentController extends Controller
{
    public function index()
    {

        $enrollments = CourseEnrollMent::with('user:id,name', 'course:id,title,thumbnail')
            ->paginate(10);

        return Inertia::render('admin/enrollments/Index', [
            'enrollments' => EnrollmentResource::collection($enrollments),
        ]);
    }
    
    public function store(Request $request, $course)
    {
        // Logic to enroll user in course
        $user = $request->user();
        $course = \App\Models\Course::find($course);

        $request->validate([
            'payment_reference' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Check if user is already enrolled
        if ($user->enrolledCourses()->where('course_id', $course->id)->exists()) {
            return redirect()->back()->with('error', 'You are already enrolled in this course');
        }

        // Upload payment reference
        $paymentReference = $request->file('payment_reference')->store('payment_references', 'public');
        
        // Enroll user
        $user->enrolledCourses()->attach($course->id, [
            'status' => 'pending', 
            'payment_reference' => $paymentReference,
        ]);
        
        return redirect()->back()->with('success', 'You have been enrolled in this course');
    }

    public function updateStatus(Request $request, $id)
    {
        $enrollment = CourseEnrollMent::find($id);
        $enrollment->status = $request->status;
        $enrollment->save();
        
        return redirect()->back()->with('success', 'Enrollment status updated successfully');
    }
}
