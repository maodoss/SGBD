<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Session;
use App\Models\candidats;
use App\Models\parrainages;
use Illuminate\Support\Carbon;

class CandidatController extends Controller
{
    public function index()
    {
        $candidats = candidats::all();
        return view('candidats.index', compact('candidats'));  //apres wa front nioy coder vue bi  
    }

    public function show($id)
    {
        $candidats = candidats::findOrFail($id);
        return view('candidats.show', compact('candidat'));
    }

    public function create()
    {
        return view('candidats.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            // attributs des candidats 
        ]);


        candidats::create($validatedData);

        return redirect()->route('candidats.index');
    }

    public function edit($id)
    {
        $candidats = candidats::findOrFail($id);
        return view('candidats.edit', compact('candidats'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            // attributs des candidats 
        ]);

        $candidats = candidats::findOrFail($id);
        $candidats->update($validatedData);

        return redirect()->route('candidats.index');
    }

    public function destroy($id)
    {
        $candidats = candidats::findOrFail($id);
        $candidats->delete();

        return redirect()->route('candidats.index');
    }

    //verification des infos pour l'inscription
    public function verification(Request $request)
    {
        $request->validate([
            'voter_card' => 'required',
            'national_id' => 'required',
            'family_name' => 'required',
            'voting_office' => 'required',
        ]);

        $num_electeur = $request->voter_card;
        $cin = $request->national_id;
        $nom = $request->family_name;
        $bureau_vote = $request->voting_office;
        $electeur = electeurs::where('num_electeur', $num_electeur)->first();


        if (!$electeur || $electeur->cin != $cin || $electeur->prenom != $nom ||  $electeur->bureau_vote != $bureau_vote) {
            return redirect()->route('inscription')->with('error', 'Informations incorrectes');
        }
        if ($electeur->aUnCompte === 1) {
            return redirect()->route('inscription')->with('error', 'Vous avez deja un compte ');
        }


        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code_auth = substr(str_shuffle($characters), 0, 8);

        // Mise à jour de l'électeur
        $electeur->update([
            'code_auth' => $code_auth,
            // 'aUnCompte' => true
        ]);

        if (
            $cin ==  $electeur->cin &&
            (string) $nom === (string) $electeur->prenom &&
            (string) $bureau_vote === (string) $electeur->bureau_vote
        ) {
            Session::put('id', $electeur->id);
            return view('Electeurs/Inscription2');
        } else {
            return redirect()->back()->with('error', 'Information incorrecte');
        }
    }


    public function sendmail(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
        ]);

        $electeur_id = Session::get('id');
        $electeur = electeurs::find($electeur_id);
        $electeurmm = electeurs::where('telephone', $request->phone);

        if (!$electeur) {
            return redirect()->back()->with('error', "Vous n'êtes pas connecté");
        }


        $code = $electeur->code_auth;

        $details = [
            'name' => 'Direction Des Elections',
            'subject' => 'Envoi de code de validation',
            'message' => 'Votre Code est ' . $code,
        ];
        $electeur->telephone = $request->phone;
        $electeur->email = $request->email;
        $electeur->save();

        Mail::to($request->email)->send(new TestMail($details));

        return view('Electeurs/Inscription3');
    }

    public function verifcode(Request $request)
    {
        $request->validate([
            'auth_code' => 'required',
        ]);

        $code = $request->auth_code;
        $electeur_id = Session::get('id');


        $electeur = electeurs::where('id', $electeur_id)->first();

        if (!$electeur) {
            return redirect()->route('/')->with('status', 'Utilisateur non trouve');
        }

        if ($electeur->aUnCompte === 1) {
            return redirect()->route('Parrainage')->with('status', 'Vous avez déjà un compte');
        }

        if ($code === $electeur->code_auth) {
            $electeur->aUnCompte = 1;
            $electeur->save();
            return redirect()->route('Parrainage')->with('status', 'Insciption reussi');
        }
    }

    public function parrainer()
    {
        return (view('Electeurs/Parrainage'));
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
        $request->session()->put('id', $electeur->id);

        if (!$electeur) {
            // return ("Erreur le numero ne correspond pas ");
            return redirect()->back()->with('error', "Erreur le numero ne correspond pas ");
        }
        if ($electeur->aUnCompte === 0) {
            return redirect()->back()->with('error', "Vous devez d'abord créer un compte  ");
        }
        if ($electeur->aVote === 1) {
            return redirect()->back()->with('error', "Vous avez déjà parrainé  ");
        }
        // dd($electeur, $num_cni, $num_electeur);
        if ($electeur->cin === $num_cni) {
            return (view('Electeurs/Parrainage2', compact('electeur')));
        } else {
            // return ("erreur");
            return redirect()->back()->with('error', "Erreur le numéro ne correspond pas ");
        }
    }


    public function Parrainage2()
    {
        $electeur_id = Session::get('id');
        $electeur = electeurs::find($electeur_id);

        return view('Electeurs/Parrainage2');
    }

    public function parrainage3(Request $request)
    {

        $request->session()->put('candidat_id', $request->candidat_id);


        $code = mt_rand(10000, 99999);
        // $request->session()->put('code_validation', $code);


        $electeur_id = Session::get('id');
        $electeur = electeurs::find($electeur_id);
        $electeur->code_auth = $code;
        $electeur->save();
        if (!$electeur) {
            return redirect()->back()->with('error', "Vous n'êtes pas connecté");
        }


        $details = [
            'name' => 'Direction Des Elections',
            'subject' => 'Code de validation - Parrainage',
            'message' => 'Votre code de validation pour le parrainage est : ' . $code,
        ];


        Mail::to($electeur->email)->send(new TestMail($details));

        return view('Electeurs.Parrainage3')->with('success', 'Un code de validation a été envoyé à votre email');
    }
    //traitement de la validation du vote
    public function confirmerVote(Request $request)
    {
        $request->validate([
            'code_validation' => 'required',
            'candidat_id' => 'required'
        ]);

        $electeur_id = Session::get('id');
        $candidat_id = Session::get('candidat_id');
        $candidat = candidats::find($candidat_id);
        $electeur = electeurs::find($electeur_id);

        if (!$electeur) {
            return back()->withErrors(['error' => "Vous n'êtes pas connecté"]);
        }

        if ($electeur->aVote == 1) {
            return back()->withErrors(['error' => "Vous avez déjà voté"]);
        }

        if ($request->code_validation != $electeur->code_auth) {
            return back()->withErrors(['error' => "Le code de validation est incorrect"]);
        }

        // Si tout est OK, on procède au vote
        $parrainage = parrainages::create([
            'electeur_id' => $electeur_id,
            'candidat_id' => $candidat_id,
            'date_parrainage' =>  Carbon::now(),
            'periode_id' => 1,
        ]);

        $candidat->nbr_vote++;
        $electeur->aVote = 1;
        $electeur->save();
        $parrainage->save();
        $candidat->save();

        return redirect()->route('Acceuil')->with('success', 'Votre vote a été enregistré avec succès');
    }

    public function showParrainage3()
    {
        $electeur_id = Session::get('id');
        $electeur = electeurs::find($electeur_id);

        if (!$electeur) {
            return redirect()->route('login')->withErrors(['error' => "Vous n'êtes pas connecté"]);
        }

        if ($electeur->aVote == 1) {
            return redirect()->route('Acceuil')->withErrors(['error' => "Vous avez déjà voté"]);
        }

        return view('Electeurs.Parrainage3');
    }

    //traitement connexion candidats

    public function traitement_login_candidat(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $candidat = candidats::where('email', $request->email)
            ->where('code_auth', $request->password)
            ->first();

        if ($candidat) {
            Session::put('candidat_id', $candidat->id);
            return redirect()->route('dash_candidat');
        }

        return redirect()->route('login')->with('error', 'Email ou mot de passe incorrect.');
    }

    public function View_candidats()
    {
        $candidats = candidats::all();
        return (view('View_candidats', compact('candidats')));
    }

    public function affiche_periode()
    {
        return (view('affiche_periode'));
    }

    public function logout()
    {
        Session::forget('candidat_id');
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }
}
