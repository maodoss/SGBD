<?php

namespace App\Http\Controllers;

use App\Models\utilisateur_dges;
use Illuminate\Http\Request;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //Controlleur 
    public function Acceuil()
    {
        return view('Acceuil');
    }

    public function login()
    {
        return view('Login');
    }
    public function inscription()
    {
        return view('Electeurs/Inscription');
    }



    public function dash_candidat()
    {
        return view('Candidat/Dash_candidat');
    }
    public function periode_parrainage()
    {
        return view('UtilisateurDge/periode_parrainage');
    }



    public function Liste_candidat()
    {
        return view('Liste_candidat');
    }
    public function details_candidat()
    {
        return view('UtilisateurDge/details_candidat');
    }
}
