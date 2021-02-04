<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $table = 'movies';

	public function author()
    {
//	    Ruft Relation mit Author-Klasse ab (n zu 1-Relation)
        return $this->belongsTo(Author::class)
    }
}
