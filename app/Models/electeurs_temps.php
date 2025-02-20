<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class electeurs_temps extends Model
{
    use HasFactory;

    protected $fillable = [
        'fichier_electoral_id', 'tentative_upload_id', 'cin', 'num_electeur', 'nature_probleme'
    ];

    public function fichier_electoral()
    {
        return $this->belongsTo(fichier_electoral::class);
    }

    public function tentative_upload()
    {
        return $this->belongsTo(tentative_uploads::class);
    }
}