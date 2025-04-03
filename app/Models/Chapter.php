<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use SoftDeletes;
	
	public function lesson() {
		return $this->belongsTo(Lesson::class);
	}
	
	public function pages() {
		return $this->hasMany(Page::class);
	}
}
