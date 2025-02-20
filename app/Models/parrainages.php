<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parrainages extends Model
{
    use HasFactory;

    protected $fillable = [
        'electeur_id', 'candidat_id', 'periode_id', 'date_parrainage'
    ];

    public function electeur()
    {
        return $this->belongsTo(electeurs::class);
    }

    public function candidat()
    {
        return $this->belongsTo(candidats::class);
    }

    public function periode()
    {
        return $this->belongsTo(periode_parrainages::class, 'periode_id');
    }
}