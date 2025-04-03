<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Arr;
use Illuminate\Support\Stringable;
use Str;

class ChapterSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('chapters')
		  ->delete();
		
		$data = DatabaseSeeder::getData();
		
		foreach ( Lesson::all() as $lesson ) {
			
			for ( $i = 0; $i <= rand(3, 10); $i++ ) {
				
				// get the title
				$title = Str::of(Arr::random($data[ rand(0, count($data) - 1) ])[ 1 ])
				            ->stripTags()
				            ->apa()
				            ->trim();
				
				if (substr($title, -1) === "") {
					$title .= ".";
				}
				
				$description = Arr::random($data[ rand(0, count($data) - 1) ]);
				
				$lesson->chapters()
				       ->create(
					       [
						       "number" => $i + 1,
						       "title"  => $title,
						       
						       "description" => implode(": ", $description)
					       ]
				       );
			}
			
			
		}
	}
	
}
