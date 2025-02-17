<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentativeUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fichier',
        'user_dge_id',
        'path',
        'checksum_utilise',
        'ip_address',
        'is_valid',
        'date'
    ];

    public function utilisateurDge()
    {
        return $this->belongsTo(utilisateur_dges::class, 'user_dge_id');
    }
}
