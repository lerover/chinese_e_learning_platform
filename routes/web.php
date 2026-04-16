<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

$canRegister = Features::enabled(Features::registration());

Route::inertia('/', 'Welcome', [
    'canRegister' => $canRegister,
])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

// Front routes
Route::prefix('front')->middleware(['web', 'auth'])->group(function () {
    Route::inertia('courses', 'front/courses/Index')->name('courses.index');
    Route::inertia('courses/{id}', 'front/courses/Detail')->name('courses.detail');
});
// Front routes

require __DIR__.'/settings.php';
