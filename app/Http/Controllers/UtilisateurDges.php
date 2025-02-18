<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur_dges;
// use App\Models\fichier_electorals;
use App\Models\FichierElectoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;

class UtilisateurDges extends Controller
{

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

    //traitement upload 
    public function Upload()
    {
        return view('Upload');
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
            return redirect()->back()->with('status', "ERREUR!! Le type de caractere doit etre UTF-8");
        }
        if ($checksum != $checksum_dge) {
            return redirect()->back()->with('status', "ERREUR!! Le checksum ne correspond pas");
        }
        if ($checksum == $checksum_dge && $encoding == "UTF-8") {
            $file->is_valid = true;
            $file->save();
            //On fait la copie car le fichier est valide 
            $filevalid = FichierElectoral::create([
                'nom_fichier' => $file->nom_fichier,
                'path' => $file->path,
                'checksum_utilise' => $file->checksum,
                'user_dge_id' => $file->user_dge_id,
            ]);
            $filevalid->save();
            return "Le checksum et le type de caractere correspondent ";
        }
    }
}
