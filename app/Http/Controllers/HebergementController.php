<?php

namespace App\Http\Controllers;

use App\Models\Hebergement;
use Illuminate\Http\Request;

class HebergementController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $hebergements = Hebergement::all(); // Fetch all hebergements
        return view('hebergements.index', compact('hebergements')); // Pass to the view
    }
    


    // Show the form for creating a new resource
    public function create()
    {
        return view('hebergements.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|string|max:255',
            'prix' => 'required|numeric',
        ]);

        Hebergement::create($request->all()); // Mass assignment for the new Hebergement

        return redirect()->route('hebergements.index')->with('success', 'Hébergement ajouté avec succès.');
    }

    // Display the specified resource
    public function show(Hebergement $hebergement)
    {
        return view('hebergements.heber', compact('hebergement'));
    }

    // Show the form for editing the specified resource
    public function edit(Hebergement $hebergement)
    {
        return view('hebergements.edit', compact('hebergement'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Hebergement $hebergement)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|string|max:255',
            'prix' => 'required|numeric',
        ]);

        $hebergement->update($request->all()); // Mass assignment for the updated Hebergement

        return redirect()->route('hebergements.index')->with('success', 'Hébergement modifié avec succès.');
    }

    // Remove the specified resource from storage
    public function destroy(Hebergement $hebergement)
    {
        $hebergement->delete();
        return redirect()->route('hebergements.index')->with('success', 'Hébergement supprimé avec succès.');
    }

    // Specialized method for the hebergementstem view
    public function hebergementStem()
    {
        $hebergements = Hebergement::where('type', 'stem')->get(); // Adjust condition based on your requirements
        return view('hebergements.hebergementstem', compact('hebergements'));
    }
}
