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
            'contenu' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName); // Déplacement du fichier image dans le dossier 'uploads'
        }
    
        Activite::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'image' => $imageName, // Sauvegarde de l'URL de l'image
        ]);
    
        return redirect()->route('activites.index')->with('success', 'Activité ajoutée avec succès');
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
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'duree' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image facultative
    ]);

    // Récupérer l'activité
    $activite = Activite::findOrFail($id);

    // Gérer l'upload de la nouvelle image
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($activite->image && file_exists(public_path('uploads/' . $activite->image))) {
            unlink(public_path('uploads/' . $activite->image));
        }

        // Upload de la nouvelle image
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        // Mettre à jour l'image de l'activité
        $activite->image = $filename;
    }

    // Mettre à jour les autres champs
    $activite->nom = $request->input('nom');
    $activite->description = $request->input('description');
    $activite->duree = $request->input('duree');
    
    // Sauvegarder les modifications
    $activite->save();

    return redirect()->route('activites.index')->with('success', 'Activité modifiée avec succès');
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
