<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('Inscription');
    }

    public function Upload()
    {
        return view('Upload');
    }

    public function dash_candidat()
    {
        return view('Dash_candidat');
    }
    public function periode_parrainage()
    {
        return view('periode_parrainage');
    }

    public function dashdge()
    {
        return view('Dashdge');
    }
    public function AdminLogin()
    {
        return view('AdminLogin');
    }
    public function Candidature()
    {
        return view('Candidature');
    }
    public function Liste_candidat()
    {
        return view('Liste_candidat');
    }
    public function details_candidat()
    {
        return view('details_candidat');
    }
}
