<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
