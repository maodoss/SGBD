<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{
    use HasFactory;

    protected $fillable = [
        'electeur_id', 'candidat_id', 'periode_id', 'date_parrainage'
    ];

    public function electeur()
    {
        return $this->belongsTo(Electeur::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeParrainage::class, 'periode_id');
    }
}