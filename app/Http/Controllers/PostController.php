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


    public function Upload()
    {
        return view('Upload');
    }
}
