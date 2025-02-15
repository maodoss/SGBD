<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElecteurTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'fichier_electoral_id', 'tentative_upload_id', 'cin', 'num_electeur', 'nature_probleme'
    ];

    public function fichierElectoral()
    {
        return $this->belongsTo(FichierElectoral::class);
    }

    public function tentativeUpload()
    {
        return $this->belongsTo(TentativeUpload::class);
    }
}