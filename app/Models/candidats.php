<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidats extends Model
{
    use HasFactory;

    protected $fillable = [
        'electeur_id',
        'email',
        'telephone',
        'code_auth',
        'nbr_vote',
        'nom_parti',
        'slogan',
        'photo',
        'couleur_parti',
        'uri_page'
    ];

    public function electeur()
    {
        return $this->belongsTo(electeurs::class, 'electeur_id');
    }
    public function parrainages()
    {
        return $this->hasMany(parrainages::class);
    }
}
