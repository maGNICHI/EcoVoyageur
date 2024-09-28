<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    
       // Display a listing of reviews for an activity
    public function index(Activite $activite)
    {
        $avis = $activite->avis()->get();
        return view('activites.show', compact('activite', 'avis'));
    }

    // Show the form for creating a new review
    public function create(Activite $activite)
    {
        return view('activites.show', compact('activite'));
    }

    // Store a newly created review
    public function store(Request $request, Activite $activite)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);
    
        $avis = new Avis;
        $avis->contenu = $request->input('contenu');
        $avis->activite_id = $activite->id; // Ensure activite_id is correctly set
        $avis->save();
    
        return redirect()->route('activites.show', $activite->id)->with('success', 'Avis ajouté avec succès!');
    }
    

    // Show the form for editing a review
    public function edit(Avis $avis)
    {
        return view('avis.edit', compact('avis'));
    }

    // Update the specified review
    public function update(Request $request, Avis $avis)
    {
        $request->validate([
            'contenu' => 'required|string',
        ]);

        $avis->contenu = $request->input('contenu');
        $avis->save();

        return redirect()->route('avis.index', $avis->activite_id)->with('success', 'Avis modifié avec succès!');
    }

    // Remove the specified review
    public function destroy(Avis $avis)
    {
        $avis->delete();
        return redirect()->route('avis.index', $avis->activite_id)->with('success', 'Avis supprimé avec succès!');
    }

    
}
