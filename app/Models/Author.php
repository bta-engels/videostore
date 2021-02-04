<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    public $timestamps = false;

    public function movies()
    {
//      hasMany-Funktion gibt Tabellen-Relationen zurück (1 zu n-Relation)
//      -> mehrere Datensätze als Array (Collection-Objekt)
        return $this->hasMany(Movie::class);
    }

}
