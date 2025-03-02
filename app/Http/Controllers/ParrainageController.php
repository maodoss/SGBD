<?php

namespace App\Http\Controllers;

use App\Models\parrainages;
use Illuminate\Http\Request;
use App\Http\Controllers\PeriodeParrainageController;

class ParrainageController extends Controller
{
    public function store(Request $request)
    {
        
        if (!PeriodeParrainageController::isPeriodeActive()) {
            return redirect()->back()->withErrors([
                'periode' => 'Les parrainages sont fermés pour le moment !'
            ]);
        }

       
    }
}