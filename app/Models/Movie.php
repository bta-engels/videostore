<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $table = 'movies';

	public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
