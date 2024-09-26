<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    // 1. Afficher la liste des activités (Read)
    public function index()
    {
        // Récupère les activités les plus récentes en premier
        $activites = Activite::orderBy('created_at', 'desc')->get();

        // Retourne la vue avec les activités (ici, par exemple, 'activites.blade.php')
        return view('activites.index', compact('activites'));
    }

    // 2. Afficher le formulaire de création d'une nouvelle activité (Create)
    public function create()
    {
        // Retourne la vue pour créer une activité (ex: 'create.blade.php')
        return view('activites.create');
    }

    // 3. Enregistrer une nouvelle activité dans la base de données (Store)
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|string',
        ]);

        // Créer une nouvelle activité
        Activite::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $request->image,
        ]);

        // Rediriger vers la liste des activités avec un message de succès
        return redirect('/activites')->with('success', 'Activité ajoutée avec succès.');
    }

    // 4. Afficher une activité spécifique (Show)
    public function show($id)
    {
        $activite = Activite::findOrFail($id); // Trouver l'activité par son ID
        return view('activites.show', compact('activite')); // Retourner la vue avec les détails de l'activité
    }

    // 5. Afficher le formulaire d'édition d'une activité (Edit)
    public function edit($id)
    {
        $activite = Activite::findOrFail($id); // Trouver l'activité par son ID
        return view('activites.edit', compact('activite')); // Retourner la vue d'édition avec les données de l'activité
    }

    // 6. Mettre à jour une activité (Update)
    public function update(Request $request, $id)
    {
        $activite = Activite::findOrFail($id); // Trouver l'activité par son ID

        // Valider les données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required',
            'image' => 'nullable|string',
        ]);

        // Mettre à jour les champs
        $activite->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $request->image,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('activites.index')->with('success', 'Activité mise à jour avec succès!');
    }

    // 7. Supprimer une activité (Delete)
    public function destroy($id)
    {
        $activite = Activite::findOrFail($id); // Trouver l'activité par son ID
        $activite->delete(); // Supprimer l'activité

        // Rediriger avec un message de succès
        return redirect()->route('activites.index')->with('success', 'Activité supprimée avec succès');
    }
    public function activiteStem()
{
    // Récupère les activités triées par date de création, les plus récentes en premier
    $activites = Activite::orderBy('created_at', 'desc')->get();

    // Retourne la vue 'activitestem' avec les données des activités
    return view('activites.activitestem', compact('activites'));
}

}
