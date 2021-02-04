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
    protected $fillable = ['firstname', 'lastname'];
    public $timestamps = false;

    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
