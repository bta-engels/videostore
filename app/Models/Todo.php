<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Todo
 *
 * @property int $id
 * @property int $done
 * @property string $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Todo newModelQuery()
 * @method static Builder|Todo newQuery()
 * @method static Builder|Todo query()
 * @method static Builder|Todo whereCreatedAt($value)
 * @method static Builder|Todo whereDone($value)
 * @method static Builder|Todo whereId($value)
 * @method static Builder|Todo whereText($value)
 * @method static Builder|Todo whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Todo extends Model
{
    use HasFactory;

	protected $table = 'todos';
	protected $fillable = ['done', 'text'];
	// $attributes-Variabe zur Definition von Standardwerten
//	protected $attributes = ['done' => false];
}
