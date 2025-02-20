<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class utilisateur_dges extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nom', 'email', 'password', 'ip_address'];
}