<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    // 1. Afficher la liste des activités (Read)
    public function index()
    {
        $activites = Activite::orderBy('created_at', 'desc')->get();
        return view('activites.index', compact('activites'));
    }

    // 2. Afficher le formulaire de création d'une nouvelle activité (Create)
    public function create()
    {
        return view('activites.create');
    }

    // 3. Enregistrer une nouvelle activité dans la base de données (Store)
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|string',
        ]);

        Activite::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $request->image,
        ]);

        return redirect()->route('activites.index')->with('success', 'Activité ajoutée avec succès.');
    }

    // 4. Afficher une activité spécifique (Show)
    public function show($id)
    {
        $activite = Activite::findOrFail($id);
        return view('activites.show', compact('activite'));
    }

    // 5. Afficher le formulaire d'édition d'une activité (Edit)
    public function edit($id)
    {
        $activite = Activite::findOrFail($id);
        return view('activites.edit', compact('activite'));
    }

    // 6. Mettre à jour une activité (Update)
    public function update(Request $request, $id)
    {
        $activite = Activite::findOrFail($id);

        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|string',
        ]);

        $activite->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $request->image,
        ]);

        return redirect()->route('activites.index')->with('success', 'Activité mise à jour avec succès!');
    }

    // 7. Supprimer une activité (Delete)
    public function destroy($id)
    {
        $activite = Activite::findOrFail($id);
        $activite->delete();

        return redirect()->route('activites.index')->with('success', 'Activité supprimée avec succès');
    }

    // 8. Afficher les activités triées (Stem)
    public function activiteStem()
    {
        $activites = Activite::orderBy('created_at', 'desc')->get();
        return view('activites.activitestem', compact('activites'));
    }
}
