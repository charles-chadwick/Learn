<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class LessonController extends Controller {
	
	/**
	 * @return Response
	 */
	public function index () {
		
		return Inertia::render(
			'Lessons/Index',
			[
				'lessons' => Lesson::all()
			]
		);
	}
	
	/**
	 * @param     $lesson_id
	 * @param int $chapter_number
	 * @return Response
	 */
	public function chapters ($lesson_id) {
		
		$lesson = Lesson::with("chapters", "chapters.pages")
		                ->find($lesson_id);
		
		return Inertia::render(
			'Chapters/Index',
			[
				'lesson' => $lesson
			]
		);
	}
	
	/**
	 * @param     $lesson_id
	 * @param int $chapter_number
	 * @return Response
	 */
	public function page ($lesson_id, $chapter_number, $page_number = null) {
		
		$chapter = Chapter::with("lesson", "pages")
		                  ->where('lesson_id', $lesson_id)
		                  ->where('number', $chapter_number)
		                  ->where('number', $page_number)
		                  ->first();
		
		return Inertia::render(
			'Chapters/Index',
			[
				'lesson'  => $chapter->lesson,
				'chapter' => $chapter,
				'page'    => $chapter->pages->first()
			]
		);
	}
	
}
