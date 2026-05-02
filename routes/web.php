<?php

use Illuminate\Support\Facades\Route;
use App\Services\LessonService;

Route::get('/', function () {
    $lessonService = new LessonService();
    $lessons = $lessonService->getLessons();
    return view('landing', compact('lessons'));
});

Route::get('/lessons/{slug}', function ($slug) {
    $lessonService = new LessonService();
    $lesson = $lessonService->getLessonBySlug($slug);
    
    if (!$lesson) {
        abort(404);
    }
    
    // We expect the view to be named after the slug
    if (view()->exists('lessons.' . $slug)) {
        return view('lessons.' . $slug, compact('lesson'));
    }
    
    // Fallback if specific view doesn't exist yet
    abort(404, "Lesson view not found.");
})->name('lesson.show');

