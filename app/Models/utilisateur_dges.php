<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilisateurDge extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'password', 'ip_address'];
}