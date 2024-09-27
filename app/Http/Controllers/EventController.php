<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Destination; // Assurez-vous d'importer le modèle Destination

class EventController extends Controller
{
    /**
     * Affiche la liste des événements.
     */
    public function index()
    {
        $events = Event::with('destination')->orderBy('created_at', 'desc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Affiche le formulaire pour créer un nouvel événement.
     */
    public function create()
    {
        $destinations = Destination::all(); // Récupère toutes les destinations pour le menu déroulant
        return view('events.create', compact('destinations'));
    }

    /**
     * Enregistre un nouvel événement.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'destination_id' => 'required|exists:destinations,id',
        ]);

        // Création de l'événement
        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Événement ajouté avec succès !');
    }

    /**
     * Affiche le formulaire pour modifier un événement.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $destinations = Destination::all(); // Récupère toutes les destinations pour le menu déroulant
        return view('events.edit', compact('event', 'destinations'));
    }

    /**
     * Met à jour un événement.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'destination_id' => 'required|exists:destinations,id',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès !');
    }

    /**
     * Supprime un événement.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès !');
    }
}
