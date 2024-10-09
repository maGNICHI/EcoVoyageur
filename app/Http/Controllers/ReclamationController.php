<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ReponseController;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    public function index()
    {
        $reclamations = Reclamation::all();
       
        return view('reclamations.index', compact('reclamations'));
    }

    public function index1()
    {
        $reclamations = Reclamation::all();
        return view('reclamations.index1', compact('reclamations'));
    }
    
    
    

    public function create()
    {

        
        $reclamations = Reclamation::all();
        return view('reclamations.create', compact('reclamations'));
    }

    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'sujet' => 'required|string',// Assurez-vous que cela est requis
        'description' => 'required',
    ]);

    // Création de la réclamation
    Reclamation::create($request->only('sujet', 'description'));

    // Redirection avec message de succès
    return redirect()->route('reclamations.index')->with('success', 'Réclamation créée avec succès.');
}

    

    public function show(Reclamation $reclamation)
    {
        return view('reclamations.show', compact('reclamation'));
    }

    public function edit(Reclamation $reclamation)
    {
        return view('reclamations.edit', compact('reclamation'));
    }

    public function update(Request $request, Reclamation $reclamation)
    {
        $request->validate([
            'sujet' => 'required',
            'description' => 'required',
        ]);

        $reclamation->update($request->all());
        return redirect()->route('reclamations.index')->with('success', 'Réclamation mise à jour avec succès.');
    }

    public function destroy(Reclamation $reclamation)
    {
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Réclamation supprimée avec succès.');
    }
}
