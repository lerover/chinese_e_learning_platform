<?php

use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseVideoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

$canRegister = Features::enabled(Features::registration());

Route::inertia('/', 'Welcome', [
    'canRegister' => $canRegister,
])->name('home');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');

    Route::resource('course-categories', CourseCategoryController::class);
    Route::resource('admin-courses', CourseController::class);
    Route::resource('admin-courses/{course}/videos', CourseVideoController::class)->parameters([
        'admin-courses' => 'course',
    ]);

    Route::get('enroll', [\App\Http\Controllers\EnrollmentController::class, 'index'])->name('enroll.index');
    Route::post('enroll/{course}', [\App\Http\Controllers\EnrollmentController::class, 'store'])->name('enroll');
    Route::post('enroll/{id}/status', [\App\Http\Controllers\EnrollmentController::class, 'updateStatus'])->name('enroll.status');
});

// Front routes
Route::prefix('front')->middleware(['web', 'auth'])->group(function () {
    Route::get('courses', function() {
        $courseCategories = \App\Models\CourseCategory::with('courses')->get();
        return Inertia::render('front/courses/Index', [
            'courseCategories' => $courseCategories,
        ]);
    })->name('courses.index');
    Route::get('courses/{id}', function($id) {
        $course = \App\Models\Course::with('courseCategory', 'videos')->find($id);
        return Inertia::render('front/courses/Detail', [
            'course' => $course,
        ]);
    })->name('courses.detail');
});
// Front routes

require __DIR__.'/settings.php';
