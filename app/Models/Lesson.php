<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
	use SoftDeletes;
	
	public function chapters() {
		return $this->hasMany(Chapter::class);
	}
}
