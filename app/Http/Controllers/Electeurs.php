<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Electeurs extends Controller
{
    public function index()
    {
        $electeurs = electeurs::all();  
        return view('electeurs.index', compact('electeurs'));  
    }

    public function show($id)
    {
        $electeur = electeurs::findOrFail($id);  
        return view('electeurs.show', compact('electeur'));  
    }


    public function create()
    {
        return view('electeurs.create');  
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            //atrribut
        ]);

        electeurs::create($validatedData);

        return redirect()->route('electeurs.index');  
    }

    
    public function edit($id)
    {
        $electeur = electeurs::findOrFail($id); 
        return view('electeurs.edit', compact('electeur'));  
    }

   
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:electeurs,email,' . $id,  
            'phone' => 'nullable|numeric', 
        ]);

        $electeur = Electeur::findOrFail($id);
        $electeur->update($validatedData);

        return redirect()->route('electeurs.index');  
    }

    public function destroy($id)
    {
        $electeur = Electeur::findOrFail($id);
        $electeur->delete();

        return redirect()->route('electeurs.index');  
    }
}
