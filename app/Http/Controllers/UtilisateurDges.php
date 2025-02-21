<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use App\Models\candidats;
use App\Models\periode_parrainages;
use Illuminate\Http\Request;
use App\Models\utilisateur_dges;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UtilisateurDges extends Controller
{
    // ... Les méthodes existantes (dashdge, AdminLogin, Upload, etc.) ...

    public function traitement_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = utilisateur_dges::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashdge');
        }

        return redirect()->back()->with('error', 'Identifiants incorrects !');
    }

    /**
     * Enregistrement d'un candidat
     */
    public function traitement_saisie_candidat(Request $request)
    {
        $request->validate([
            'electeur_id' => 'required|exists:electeurs,id',
            'email' => 'required|email|unique:candidats,email',
            'telephone' => 'required|unique:candidats,telephone',
            'nom_parti' => 'nullable|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'couleurs' => 'required|string|max:100',
            'urlInfos' => 'nullable|url'
        ]);

        // Gestion de l'upload de la photo
        $photoPath = $request->file('photo')->store('public/candidats');

        candidats::create([
            'electeur_id' => $request->electeur_id,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'nom_parti' => $request->nom_parti,
            'slogan' => $request->slogan,
            'photo' => Storage::url($photoPath),
            'couleur_parti' => $request->couleurs,
            'uri_page' => $request->urlInfos,
            'code_auth' => substr(md5(uniqid()), 0, 8) // Génération d'un code aléatoire
        ]);

        return redirect()->route('Liste_candidat')->with('success', 'Candidat enregistré avec succès !');
    }

    /**
     * Gestion de la période de parrainage
     */
    public function setPeriodeParrainage(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date|after:+6 months',
            'date_fin' => 'required|date|after:date_debut'
        ]);

        periode_parrainages::updateOrCreate(
            ['id' => 1], // Assume une seule période active
            $request->only(['date_debut', 'date_fin'])
        );

        return redirect()->back()->with('success', 'Période mise à jour !');
    }

    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('AdminLogin');
    }
}