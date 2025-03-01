<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

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
        // dd($num_electeur, $cin, $nom, $bureau_vote, $electeur);

        if (!$electeur) {
            return back()->withErrors(['error' => 'Aucun électeur trouvé avec ce numéro.']);
        }
        if (
            $cin ==  $electeur->cin &&
            (string) $nom === (string) $electeur->nom &&
            (string) $bureau_vote === (string) $electeur->bureau_vote
        ) {
            // dd($electeur);
            return view('Electeurs/Inscription2');
        } else {
            // dd($electeur);
            return "erreur";
        }
    }


    public function sendmail(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',


        ]);

        $phone = $request->phone;
        $mail = $request->email;
        $details = [
            'name' => 'Direction Des Elections ',
            'subject' => 'Envoi de code de validation',
            'message' => 'Votre Code est Fee24 ',
        ];
        Mail::to($mail)->send(new TestMail($details));

        return (view('Electeurs/Inscription3'));
    }

    public function verifcode(Request $request)
    {

        $request->validate([
            'auth_code' => 'required',
        ]);

        $code = $request->auth_code;

        if ($code == "Fee24") {
            // return (view('Electeurs/Parrainage'));
            return view('Acceuil')->with('status', "Votre compte a ete enregistre Vous pouvez maintenant vous connecter ");
        }
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
