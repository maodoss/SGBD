<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Session;

class Candidats extends Controller
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
            // attributs des candidats solen pare model yi
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

    if (!$electeur) {
        return back()->withErrors(['error' => 'Aucun électeur trouvé avec ce numéro.']);
    }

    
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code_auth = substr(str_shuffle($characters), 0, 8);

    // Mise à jour de l'électeur
    $electeur->update([
        'code_auth' => $code_auth,
        'aUnCompte' => true
    ]);

    if (
        $cin ==  $electeur->cin &&
        (string) $nom === (string) $electeur->nom &&
        (string) $bureau_vote === (string) $electeur->bureau_vote
    ) {
        Session::put('id', $electeur->id);
        return view('Electeurs/Inscription2');
    } else {
        return "Erreur de validation des informations";
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
    
    if (!$electeur) {
        return redirect()->back()->with('error', "Vous n'êtes pas connecté");
    }

    
    $code = $electeur->code_auth;

    $details = [
        'name' => 'Direction Des Elections',
        'subject' => 'Envoi de code de validation',
        'message' => 'Votre Code est ' . $code,
    ];

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
    
    // Récupérer l'électeur avec le code d'authentification
    $electeur = electeurs::find($electeur_id);

    if (!$electeur) {
        return redirect()->back()->with('error', 'Session invalide');
    }

    if ($electeur->aUnCompte == 1) { // Correction du nom de colonne (case-sensitive)
        return redirect()->back()->with('error', 'Vous avez déjà un compte');
    }

    // Vérifier si le code saisi correspond au code généré
    if ($code === $electeur->code_auth) { 
        $electeur->aUnCompte = 1;
        $electeur->save();
        return redirect()->route('Acceuil')->with('status', 'Votre compte a été enregistré !');
    }

    return redirect()->back()->with('error', 'Code invalide');
}

    public function parrainer()
    {
        return (view('Electeurs/Parrainage'));
    }



    //traitement connexion candidats

    public function traitement_login_candidat(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $email = $request->email;
        $password = $request->password;
        //je dois avoir l'attribut password pour avance 
    }
}