<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    /**
     * Affiche la liste des destinations.
     */
    public function index()
    {
        $destinations = Destination::orderBy('created_at', 'desc')->get();
        return view('destinations.index', compact('destinations'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle destination.
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Enregistre une nouvelle destination.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Création de la destination
        Destination::create($request->all());

        return redirect()->route('destinations.index')->with('success', 'Destination ajoutée avec succès !');
    }
    public function show($id)
    {
       
        $destination = Destination::with('events')->findOrFail($id); 
        return view('destinations.show', compact('destination'));
    }
    /**
     * Affiche le formulaire pour modifier une destination.
     */
    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.edit', compact('destination'));
    }

    /**
     * Met à jour une destination.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'adresse' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $destination = Destination::findOrFail($id);
        $destination->update($request->all());

        return redirect()->route('destinations.index')->with('success', 'Destination mise à jour avec succès !');
    }

    /**
     * Supprime une destination.
     */
    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination supprimée avec succès !');
    }
     public function destination()
    {
        $destinations = Destination::all();
    return view('destinations.destination', compact('destinations'));
    
     }
}
