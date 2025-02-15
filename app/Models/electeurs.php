<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin', 'num_electeur', 'nom', 'prenom', 'date_naissance', 
        'lieu_naissance', 'sexe', 'bureau_vote', 'email', 'telephone', 'code_auth', 'fichier_electoral_id'
    ];

    public function fichierElectoral()
    {
        return $this->belongsTo(FichierElectoral::class);
    }
}