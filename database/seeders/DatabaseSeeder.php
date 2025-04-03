<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Arr;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use Str;

class DatabaseSeeder extends Seeder {
	
	/**
	 * Seed the application's database.
	 */
	public function run (): void {
		
		$this->call(LessonSeeder::class);
		$this->call(ChapterSeeder::class);
		$this->call(PageSeeder::class);
	
	}
	
	public static function getData () {
		
		$filePath = database_path("src/simpsons_dataset.csv"); // Specify your CSV file path
		$handle = fopen($filePath, 'r');
		
		if ($handle === false) {
			throw new RuntimeException("Unable to open the CSV file at $filePath");
		}
		
		$chunks = [];
		$currentChunk = [];
		
		while ( ( $row = fgetcsv($handle) ) !== false ) {
			// Check if the row is empty
			if (empty(array_filter($row))) {
				if (!empty($currentChunk)) {
					$chunks[] = $currentChunk;
					$currentChunk = [];
				}
			}
			else {
				$currentChunk[] = $row;
			}
		}
		
		// Add the last chunk if it exists
		if (!empty($currentChunk)) {
			$chunks[] = $currentChunk;
		}
		
		fclose($handle);
		
		$return = [];
		foreach($chunks as $chunk) {
			$return[] = array_filter($chunk, function($row) {
				return isset($row[0]) && isset($row[1]) && $row[0] !== "" && $row[1] !== "";
			});
		}
		return $return;
	}
	
}
