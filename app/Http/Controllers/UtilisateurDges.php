<?php

namespace App\Http\Controllers;

use App\Models\electeurs;
use Illuminate\Http\Request;
use App\Models\utilisateur_dges;
use App\Models\fichier_electoral;
// use App\Models\FichierElectoral;
use App\Models\tentative_uploads;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;

class UtilisateurDges extends Controller
{

    public function dashdge()
    {
        return view('UtilisateurDge/Dashdge');
    }
    public function AdminLogin()
    {
        return view('UtilisateurDge/AdminLogin');
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

            return view('UtilisateurDge/dashdge');
        } else {
            return "Connexion non réussie";
        }
        // if (auth()->attempt(request()->only(['email', 'password']))) {
        //     return ("Connexion reussie");
        // } else {
        //     return ("Connexion non reussie");
        // }
    }

    //traitement upload 
    public function Upload()
    {
        return view('UtilisateurDge/Upload');
    } //renvoie le formulaire 
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

        $path = storage_path('app/' . $file->path);
        $content = file_get_contents($path);

        // S'il y'a une erreur "not permitted" sur laravel executer la commande en dessous sur votre terminal en tant qu'admin .
        // icacls "C:\Users\Mouha\OneDrive\Bureau\SGBD\SGBD\storage\app\public\files\*" /grant Everyone:F



        // Détecter l'encodage
        $encoding = mb_detect_encoding($content, ['UTF-8', 'ISO-8859-1', 'Windows-1252', 'ASCII'], true);

        if ($encoding != "UTF-8") {
            return redirect()->back()->with('error', "ERREUR!! Le type de caractere doit etre UTF-8");
        }
        if ($checksum != $checksum_dge) {
            return redirect()->back()->with('error', "ERREUR!! Le checksum ne correspond pas");
        }
        if ($checksum == $checksum_dge && $encoding == "UTF-8") {
            $file->is_valid = true;
            $file->save();
            //On fait la copie car le fichier est valide 
            $filevalid = fichier_electoral::create([
                'nom_fichier' => $file->nom_fichier,
                'path' => $file->path,
                'checksum' => $file->checksum_utilise,
                'user_dge_id' => $file->user_dge_id,
            ]);
            $filevalid->save();

            //test
            $file = $filevalid->path;
            // $path = $filevalid->getRealPath();
            // Ouvrir le fichier CSV
            $handle = fopen($path, 'r');

            $header = true; // Pour ignorer la première ligne (titres des colonnes)

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($header) {
                    $header = false;
                    continue;
                }

                // Insérer les données dans la table electeurs
                electeurs::create([
                    'cin'                 => $row[0],
                    'num_electeur'        => $row[1],
                    'nom'                 => $row[2],
                    'prenom'              => $row[3],
                    'date_naissance'      => $row[4],
                    'lieu_naissance'      => $row[5],
                    'sexe'                => $row[6],
                    'bureau_vote'         => $row[7],
                    'email'               => $row[8],
                    'telephone'           => $row[9],
                    'code_auth'           => $row[10],
                    'fichier_electoral_id' => $filevalid->id,

                    // 'fichier_electoral_id' => $row[11],
                ]);
            }

            fclose($handle);

            //fintest

            return redirect()->back()->with('status', "Le fichier a ete soumis. Les electeurs sont enregistres");
        }
    }

    public function Verif_electeur()
    {
        return view('UtilisateurDge/Verif_electeur');
    }
    public function saisie_candidat()
    {
        return view('UtilisateurDge/saisie_candidat');
    }

    public function Verif_traitement(Request $request)
    {
        $request->validate([
            'numero_electeur' => ['required'],
        ]);
        $numero  = $request->numero_electeur;
        // dd($numero);

        $candidat = electeurs::where('num_electeur', $numero)->first();
        return $candidat->nom;
        // return view('UtilisateurDge/saisie_candidat', compact('candidat'));
    }
}
