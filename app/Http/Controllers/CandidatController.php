<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Session;
use App\Models\candidats;

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

    public function parrainage3(Request $request)
    {

        $request->session()->put('candidat_id', $request->candidat_id);


        $code = mt_rand(10000, 99999);
        $request->session()->put('code_validation', $code);


        $electeur_id = Session::get('id');
        $electeur = electeurs::find($electeur_id);

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
        $electeur = electeurs::find($electeur_id);
        if (!$electeur) {
            return redirect()->back()->with('error', "Vous n'êtes pas connecté");
        }


        if ($request->code_validation != session('code_validation')) {
            return back()->with('error', 'Code de validation incorrect');
        } else {
            $electeur->aVote = 1;
            $electeur->save();
        }


        // Enregistrer le vote
        // TODO: Ajouter votre logique de sauvegarde du vote ici

        return redirect()->route('Acceuil')->with('success', 'Votre vote a été enregistré avec succès');
    }

    //traitement connexion candidats

    public function traitement_login_candidat(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        $candidat = \App\Models\candidats::where('email', $request->email)
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
}
