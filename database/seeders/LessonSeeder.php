<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Arr;
use Str;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    DB::table('lessons')
	      ->delete();

	    $data = DatabaseSeeder::getData();
	    
	    for ( $i = 0; $i <= 10; $i++ ) {
		    
		    // get the title
		    $title = Str::of(Arr::random($data[ rand(0, count($data) - 1) ])[ 1 ])
		                ->stripTags()
		                ->apa()
		                ->trim()
					    ->limit(25, '.', true);
		    
		    if (substr($title, -1) === "") {
			    $title .= ".";
		    }
		    $description = Arr::random($data[ rand(0, count($data) - 1) ]);
		    
		    Lesson::create(
			    [
				    "title" => $title,
				    
				    "description" => implode(": ", $description)
			    ]
		    );
	    }
    }
}
