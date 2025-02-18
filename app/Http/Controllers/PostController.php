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

    //traitement upload 

    public function traitement_upload(Request $request)
    {
        $request->validate([
            'temp_file' => 'required|file|max:2048',
            'checksum' => 'required'
        ]);
        $checksum_dge = $request->checksum;
        $path = $request->file('temp_file')->store('public/files');
        $fileName = $request->file('temp_file')->getClientOriginalName();
        $user_dge_id = utilisateur_dges::find(Auth::id())->id;

        $checksum = hash_file('sha256', storage_path('app/' . $path));
        $file = tentative_uploads::create([
            'nom_fichier' => $fileName,
            'path' => $path,
            'checksum_utilise' => $checksum,
            'user_dge_id' => $user_dge_id,
        ]);

        if ($checksum == $checksum_dge) {
            $file->is_valid = true;
            $file->save();
            return "Les checksums correspondent ";
        } else {
            return redirect()->back()->with('status', "ERREUR!! Le Checksum ne correspond pas");
        }
    }
}
