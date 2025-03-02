<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class electeurs extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin',
        'num_electeur',
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'bureau_vote',
        'email',
        'aVote',
        'aUnCompte',
        'telephone',
        'code_auth',
        'fichier_electoral_id'
    ];

    public function fichier_electoral()
    {
        return $this->belongsTo(fichier_electoral::class);
    }
}
