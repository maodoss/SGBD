<?php

namespace App\Http\Controllers;

use App\Models\periode_parrainages;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PeriodeParrainageController extends Controller
{
  
    public function setPeriode(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'date_debut' => 'required|date|after_or_equal:today +6 months',
            'date_fin' => 'required|date|after:date_debut'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

       
        periode_parrainages::updateOrCreate(
            ['id' => 1], 
            [
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin
            ]
        );

        return redirect()->back()->with('success', 'Période enregistrée avec succès !');
    }

    /**
     * Vérifie si la période de parrainage est active
     */
    public static function isPeriodeActive()
    {
        $periode = periode_parrainages::first();
        
        if (!$periode) {
            return false;
        }

        $now = Carbon::now();
        return $now->between(
            Carbon::parse($periode->date_debut),
            Carbon::parse($periode->date_fin)
        );
    }
}