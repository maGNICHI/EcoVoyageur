<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport; // Assurez-vous que cette ligne est présente
use App\Models\Itineraire; // Ajoutez cette ligne pour importer le modèle Itineraire

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transport::with('itineraire')->orderBy('created_at', 'desc')->get();


    return view('transports', compact('transports'));
 }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $itineraire = Itineraire::all(); // Récupère tous les itinéraires
        return view('createtrans', compact('itineraire')); // Passe les itinéraires à la vue

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
            'type' => 'required|string',
            'description' => 'nullable|string',
            'capacite' => 'required|integer',
            'itineraire_id' => 'required|exists:itineraires,id',
        ]);


        Transport::create($request->all());


        return redirect()->route('transports.index')->with('success', 'Transport ajouté avec succès !');

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
        $transport = Transport::findOrFail($id);
        $itineraire = Itineraire::all(); // Récupère tous les itinéraires pour le menu déroulant
        return view('edittransport', compact('transport', 'itineraire')); // Passe le transport et les itinéraires à la vue
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
        $request->validate([
            'type' => 'required|string',
            'description' => 'required|string',
            'capacite' => 'required|integer',
            'itineraire_id' => 'required|exists:itineraires,id',
        ]);

        // Mise à jour du transport
        $transport = Transport::findOrFail($id);
        $transport->update($request->all());

        // Redirection vers la liste des transports
        return redirect()->route('transports.index')->with('success', 'Transport mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete(); // Supprime le transport

        // Redirection vers la liste des transports
        return redirect()->route('transports.index')->with('success', 'Transport supprimé avec succès !');
    }
    public function transportStem()
    {
        // Récupère les transports avec les itinéraires associés triés par date de création
        $transports = Transport::with('itineraire')->orderBy('created_at', 'desc')->get();

        // Retourne la vue 'transportstem_template' avec les données des transports
        return view('transportstem', compact('transports'));
    }

}
