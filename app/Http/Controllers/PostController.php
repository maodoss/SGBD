<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fichier_electoral;
use App\Models\tentative_uploads;

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

    public function dashdge()
    {
        return view('Dashdge');
    }
    public function AdminLogin()
    {
        return view('AdminLogin');
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

        $checksum = hash_file('sha256', storage_path('app/' . $path));
        $file = tentative_uploads::create([
            'nom_fichier' => $fileName,
            'path' => $path,
            'checksum_utilise' => $checksum,
        ]);

        if ($checksum == $checksum_dge) {
            $file->is_valid = true;
            $file->save();
            return "Les checksums correspondent ";
        } else {
            return "Les checksum ne correspondent pas ";
        }
>>>>>>> de20051d60afebef3f3575ca9d60f3381fa6c742
    }
}
