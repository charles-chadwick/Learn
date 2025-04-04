<?php

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

Route::prefix("/lessons")
     ->group(function () {
	     
	     Route::get("/", [ LessonController::class, "index" ])
	          ->name("lessons.index");
		 
	     Route::get("/{lesson_id}/chapters", [ LessonController::class, "chapters" ])
	          ->name("lessons.chapters");
		 
	     Route::get("/{lesson_id}/chapter/{chapter_id}/page/{page_number?}", [ LessonController::class, "page" ])
	          ->name("lessons.chapter");
     });