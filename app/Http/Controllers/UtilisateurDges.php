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
use App\Models\candidats;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use PhpParser\Node\Stmt\Foreach_;

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

                ]);
            }

            fclose($handle);


            return redirect()->back()->with('status', "Le fichier a ete soumis. Les electeurs sont enregistres");
        }
    }

    public function Verif_electeur()
    {
        return view('UtilisateurDge/Verif_electeur');
    }


    public function Verif_traitement(Request $request)
    {
        $request->validate([
            'numero_electeur' => ['required'],
        ]);
        $numero  = $request->numero_electeur;
        $candidat = electeurs::where('num_electeur', $numero)->first();
        if (!$candidat) {
            return redirect()->back()->with('error', "Erreur sur le numero electeur");
        }
        $testid = $candidat->id;
        $cantidat_test = candidats::where('electeur_id', $testid)->first();
        if ($cantidat_test) {
            return redirect()->back()->with('error', "Le candidat est deja enregistre");
        }
        // return $candidat->nom;
        if (!$candidat) {
            return view('UtilisateurDge/Verif_electeur');
            # code...
        }
        return view('UtilisateurDge/saisie_candidat', compact('candidat'));
    }

    public function traitement_saisie_candidat(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'telephone' => ['required'],
            'parti' => ['required'],
            'slogan' => ['required'],
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'couleurs' => ['required'],
            'urlInfos' => ['required'],
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('candidats', 'public');
        } else {
            return back()->withErrors(['photo' => 'Une erreur est survenue lors du téléchargement de la photo.']);
        }
        $email = $request->email;
        $telephone = $request->telephone;
        $parti = $request->parti;
        $slogan = $request->slogan;
        $couleur = $request->couleurs;
        $urlInfos = $request->urlInfos;
        $num_electeur = $request->num_electeur;
        $electeur = electeurs::where('num_electeur', $num_electeur)->first();
        if (!$electeur) {
            return redirect()->back()->with('error', "Erreur le numero ne correspond pas ");
        }
        $cin = $electeur->cin;
        $electeur_id = $electeur->id;
        $characters = 'ABCDEFGHIJKLMNPOQRSTUVWXYZ0123456789';
        $code_auth = substr(str_shuffle($characters), 0, 8);

        $candidats = candidats::create([
            'email' => $email,
            'telephone' => $telephone,
            'nom_parti' => $parti,
            'slogan' => $slogan,
            'photo' => $photoPath, // On stocke le chemin de l'image, pas l'objet
            'couleur_parti' => $couleur,
            'uri_page' => $urlInfos,
            'electeur_id' => $electeur_id,
            'code_auth' => $code_auth,

        ]);
        $candidats->save();
        $details = [
            'name' => 'Direction Des Elections ',
            'subject' => 'Envoi information de connexion sur votre compte candidat',
            'message' => 'Votre mdp est ' . $code_auth  . ' . Bonne chance',
        ];
        Mail::to($email)->send(new TestMail($details));

        return view('UtilisateurDge/Verif_electeur')->with('status', "Le candidat a ete enregistrer ");
    }

    public function Liste_candidat()
    {
        $candidats = candidats::all();
        if (!$candidats) {
            return ("Il y'a pas encore de candidats "); //a gerer apres
        }
        return view('Liste_candidat', compact('candidats'));
    }

    public function details_candidat()
    {
        return view('UtilisateurDge/details_candidat');
    }
    public function regenerateCode($id)
{
    $candidat = candidats::findOrFail($id);
    
    // Génération du nouveau code
    $characters = 'ABCDEFGHIJKLMNPOQRSTUVWXYZ0123456789';
    $new_code = substr(str_shuffle($characters), 0, 8);

    // Mise à jour du code
    $candidat->update(['code_auth' => $new_code]);

    // Envoi du mail
    Mail::to($candidat->email)->send(new TestMail([
        'name' => 'Direction Des Elections',
        'subject' => 'Nouveau code d\'authentification',
        'message' => 'Votre nouveau code est : ' . $new_code
    ]));

    return redirect()->back()->with('status', 'Nouveau code envoyé avec succès !');
}
}
