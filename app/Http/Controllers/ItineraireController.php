<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itineraire; // Ajoutez cette ligne pour importer le modèle

class ItineraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $itineraire = Itineraire::orderBy('created_at', 'desc')->get();


    return view('itineraires', compact('itineraire'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$request->validate([
    'nom' => 'required|string|max:255',
    'description' => 'required|string',
    'duree' => 'required|string|max:100',
]);

// Créer un nouvel itinéraire
Itineraire::create([
    'nom' => $request->nom,
    'description' => $request->description,
    'duree' => $request->duree,
]);


return redirect('/itineraires')->with('success', 'Itinéraire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itineraire = Itineraire::findOrFail($id);
        return view('edit', compact('itineraire'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itineraire = Itineraire::findOrFail($id);


        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'duree' => 'required|string|max:255',
        ]);


        $itineraire->nom = $request->nom;
        $itineraire->description = $request->description;
        $itineraire->duree = $request->duree;
        $itineraire->save(); // Enregistrer les modifications

        return redirect()->route('itineraires.index')->with('success', 'Itinéraire mis à jour avec succès!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itineraire = Itineraire::findOrFail($id);
        $itineraire->delete();

        return redirect()->route('itineraires.index')->with('success', 'Itinéraire supprimé avec succès'); // Rediriger avec message
        }
        public function itineraireStem()
{

    $itineraire = Itineraire::orderBy('created_at', 'desc')->get();


    return view('itinerairestem', compact('itineraire'));
}

}
