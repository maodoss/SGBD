<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisateurDge extends Model
{
    protected $fillable = [
        'email',
        'password',
        // autres champs...
    ];

    protected $hidden = [
        'password',
    ];
} 