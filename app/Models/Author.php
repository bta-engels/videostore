<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Author
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|Author newModelQuery()
 * @method static Builder|Author newQuery()
 * @method static Builder|Author query()
 * @method static Builder|Author whereFirstname($value)
 * @method static Builder|Author whereId($value)
 * @method static Builder|Author whereLastname($value)
 * @mixin Eloquent
 */
class Author extends Model
{
    protected $table = 'authors';
    // fillable definiert Spalten, die man später überschreiben kann per mass assignment
    protected $fillable = ['firstname', 'lastname'];
    // Definiere neue Variable 'name', die so nicht im Datensatz enthalten ist
    protected $appends = ['name'];
    public $timestamps = false;

    public function movies()
    {
//      hasMany-Funktion gibt Tabellen-Relationen zurück (1 zu n-Relation)
//      -> mehrere Datensätze als Array (Collection-Objekt)
        return $this->hasMany(Movie::class);
    }

    // Funktionsname aus Präfix get, Suffix Attribute und gewähltem Variablennamen
    // Funktion definiert, was auf der neu generierten Variablen unter $appends gespeichert werden soll
    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}
