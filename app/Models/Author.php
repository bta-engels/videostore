<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';

    public function movies()
    {
//        hasMany-Funktion gibt Tabellen-Relationen aus
        return $this->hasMany(Movie::class);
    }

}
