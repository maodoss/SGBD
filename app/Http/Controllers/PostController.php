<?php

namespace App\Http\Controllers;

use App\Models\utilisateur_dges;
use Illuminate\Http\Request;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;
use Illuminate\Support\Facades\Auth;


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
        return view('Inscription');
    }

    public function Upload()
    {
        return view('Upload');
    }

    public function dash_candidat()
    {
        return view('Dash_candidat');
    }
    public function periode_parrainage()
    {
        return view('periode_parrainage');
    }

    
    public function Candidature()
    {
        return view('Candidature');
    }
    public function Liste_candidat()
    {
        return view('Liste_candidat');
    }
    public function details_candidat()
    {
        return view('details_candidat');
    }

    //traitement upload 

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
            return "Le checksum et le type de caractere correspondent ";
        }
    }
}
