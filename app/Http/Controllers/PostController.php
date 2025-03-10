<?php

namespace App\Http\Controllers;

use App\Models\candidats;
use App\Models\utilisateur_dges;
use Illuminate\Http\Request;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;
use App\Models\electeurs;
use App\Models\parrainages;
use Illuminate\Support\Carbon;

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
        if (!$electeur) {
            // return ("Erreur le numero ne correspond pas ");
            return redirect()->back()->with('error', "Erreur le numero ne correspond pas ");
        }
        if ($electeur->aUnCompte === 0) {
            return redirect()->back()->with('error', "Vous devez dabord creer un compte  ");
        }
        // dd($electeur, $num_cni, $num_electeur);
        if ($electeur->cin === $num_cni) {
            return (view('Electeurs/Parrainage2', compact('electeur')));
        } else {
            // return ("erreur");
            return redirect()->back()->with('error', "Erreur le numero ne correspond pas ");
        }
    }



    public function ListeCandidatElec($id)
    {
        $candidats = candidats::all();
        $electeurs = electeurs::all();
        return (view('Electeurs/ListeCandidatElec', compact('candidats', 'electeurs', 'id')));
    }

    public function vote(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'candidat' => 'required',
        ]);
        $id_can = $request->candidat;
        $electeur = electeurs::where('id', $id)->first();

        if ($electeur->aVote === 1) {
            return redirect()->back()->with('error', 'Vous avez deja vote');
        }
        // dd($id);
        $parrainage = parrainages::create([
            'electeur_id' => $id,
            'candidat_id' => $id_can,
            'date_parrainage' =>  Carbon::now(),
            'periode_id' => 1,
        ]);
        $candidat = candidats::where('id', $id_can)->first();
        $candidat->nbr_vote++;



        $electeur = electeurs::where('id', $id)->first();
        $electeur->aVote = 1;

        $electeur->save();
        $candidat->save();
        $parrainage->save();
        return redirect()->back()->with('status', 'Votre vote a ete enregistré ');
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
