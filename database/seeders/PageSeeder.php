<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder {
	
	/**
	 * Run the database seeds.
	 */
	public function run (): void {
		
		DB::table('pages')
		  ->delete();
		
		$data = DatabaseSeeder::getData();
		
		foreach ( Chapter::all() as $chapter ) {
			
			$index = 1;
			for ( $i = 3; $i <= rand(3, 10); $i++ ) {
				
				$content = array_map(function ($item) {
					return "<p>" . implode(": ", $item) . "</p>";
				}, $data[ rand(0, count($data) - 1) ]);
				
				$chapter->pages()
				        ->create(
					        [
						        "number"  => $index,
						        "content" => "<p>" . implode("", $content) . "</p>"
					        ]
				        );
				
			}
			
		}
	}
	
}
