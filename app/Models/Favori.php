<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $univers_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereUniversId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Favori whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Favori extends Model
{
    protected $fillable = ['user_id', 'univers_id'];
}
