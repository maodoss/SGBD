<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurDges extends Controller
{
    public function dashdge()
    {
        return view('Dashdge');
    }
    public function AdminLogin()
    {
        return view('AdminLogin');
    }

    public function traitement_login()
    {
        validator(request()->all(), [
            'email' => ['required'],
            'password' => ['required']

        ])->validate();
        $user = utilisateur_dges::where('email', request('email'))->first();

        if ($user && $user->password === request('password')) {
            // Authentifier manuellement l'utilisateur
            auth()->login($user);

            return view('dashdge');
        } else {
            return "Connexion non réussie";
        }
        // if (auth()->attempt(request()->only(['email', 'password']))) {
        //     return ("Connexion reussie");
        // } else {
        //     return ("Connexion non reussie");
        // }
    }
}
