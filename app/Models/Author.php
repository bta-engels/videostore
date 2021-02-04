<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    public $timestamps = false;

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
