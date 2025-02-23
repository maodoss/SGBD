<?php

namespace App\Http\Controllers;

use App\Models\utilisateur_dges;
use Illuminate\Http\Request;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;
use App\Models\electeurs;


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
    public function Inscription2()
    {
        return view('Electeurs/Inscription2');
    }
    public function Inscription3()
    {
        return view('Electeurs/Inscription3');
    }
    public function Parrainage()
    {
        return view('Electeurs/Parrainage');
    }

    public function verification_parrain(Request $request)
    {
        // dd();
        $request->validate([
            'num_electeur' => 'required',
            'num_cni' => 'required',

        ]);

        $num_electeur = $request->num_electeur;
        $num_cni = $request->num_cni;

        $electeur = electeurs::where('num_electeur', $num_electeur)->first();
        // dd($electeur, $num_cni, $num_electeur);
        if ($electeur->cni === $num_cni) {
            return ("erreur");
        }
        return (view('Electeurs/Parrainage2', compact('electeur')));
    }

    public function ListeCandidatElec()
    {
        return (view('Electeurs/ListeCandidatElec'));
    }

    public function Parrainage2()
    {
        return view('Electeurs/Parrainage2');
    }
    public function Parrainage3()
    {
        return view('Electeurs/Parrainage3');
    }
    public function dash_electeur()
    {
        return view('Electeurs/dash_electeur');
    }



    public function dash_candidat()
    {
        return view('Candidats/Dash_candidat');
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
