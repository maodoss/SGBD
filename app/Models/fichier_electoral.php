<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierElectoral extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fichier',
        'path',
        'checksum',
        'date_upload',
        'est_valide',
        'user_dge_id',
        'ip_address'
    ];

    public function utilisateurDge()
    {
        return $this->belongsTo(UtilisateurDge::class, 'user_dge_id'); 
    }
}
