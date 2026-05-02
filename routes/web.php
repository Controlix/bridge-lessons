<?php

use Illuminate\Support\Facades\Route;
use App\Services\LessonService;

Route::get('/', function () {
    $lessonService = new LessonService();
    $lessons = $lessonService->getLessons();
    return view('landing', compact('lessons'));
});
