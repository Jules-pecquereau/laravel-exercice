<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Univers extends Model
{
    use HasFactory, Notifiable;
        protected $fillable = [
        'nom',
        'description',
        "lien_vers_le_logo",
        "lien_vers_l'image",
        "couleur_secondaire",
        "couleur_principale",
    ];
}
