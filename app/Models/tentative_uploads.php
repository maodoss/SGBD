<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentative_uploads extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_fichier',
        'path',
        'checksum_utilise',
        'date_upload',
        'est_valide',
        'ip_address',

    ];
}
