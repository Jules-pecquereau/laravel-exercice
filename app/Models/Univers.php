<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Database\Factories\UniversFactory;

/**
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property string $lien_vers_l_image
 * @property string $lien_vers_le_logo
 * @property string $couleur_principale
 * @property string $couleur_secondaire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @method static \Database\Factories\UniversFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Univers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Univers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Univers query()
 *
 * @mixin \Eloquent
 *
 * @use HasFactory<\Database\Factories\UniversFactory>
 */

class Univers extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'description',
        'lien_vers_le_logo',
        'lien_vers_l_image',
        'couleur_secondaire',
        'couleur_principale',
    ];
}
