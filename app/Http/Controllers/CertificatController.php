<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificat; // Ensure this line is present
use App\Models\Partenaire; // Import the Partenaire model if necessary

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificats = Certificat::with('partenaire')->orderBy('created_at', 'desc')->get();

        // Return the view with the certificats
        return view('certificats', compact('certificats')); // Pass the certificats to the view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partenaires = Partenaire::all(); // Retrieve all partenaires
        return view('createCertificat', compact('partenaires')); // Pass the partenaires to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'organisme_emetteur' => 'required|string',
            'date_attribution' => 'required|date',
            'date_expiration' => 'required|date',
            'partenaire_id' => 'required|exists:partenaires,id',
<<<<<<< Updated upstream
=======
        ], [
            'nom.required' => 'Le nom est requis.',
            'description.min' => 'La description doit comporter au moins 20 caractères',
            'organisme_emetteur.required' => 'L\'organisme émetteur est requis.',
            'date_attribution.after_or_equal' => 'La date d\'attribution doit être aujourd\'hui ou une date future.',
            'date_expiration.after' => 'La date d\'expiration doit être après la date d\'attribution.',
            'partenaire_id.required' => 'Le partenaire est requis.',
>>>>>>> Stashed changes
        ]);

        // Create the certificat
        Certificat::create($request->all());

        // Redirect to the list of certificats
        return redirect()->route('certificats.index')->with('success', 'Certificat ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificat = Certificat::findOrFail($id); // Retrieve the certificat by its ID
        return view('showCertificat', compact('certificat')); // Return the view for displaying the certificat
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificat = Certificat::findOrFail($id); // Retrieve the certificat by its ID
        $partenaires = Partenaire::all(); // Retrieve all partenaires for the dropdown
        return view('editCertificat', compact('certificat', 'partenaires')); // Pass the certificat and partenaires to the view
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
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'organisme_emetteur' => 'required|string',
            'date_attribution' => 'required|date',
            'date_expiration' => 'required|date',
            'partenaire_id' => 'required|exists:partenaires,id',
        ]);

        // Update the certificat
        $certificat = Certificat::findOrFail($id);
        $certificat->update($request->all());

        // Redirect to the list of certificats
        return redirect()->route('certificats.index')->with('success', 'Certificat mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificat = Certificat::findOrFail($id);
        $certificat->delete(); // Delete the certificat

        // Redirect to the list of certificats
        return redirect()->route('certificats.index')->with('success', 'Certificat supprimé avec succès !');
    }

    public function certificatStem()
    {
        // Retrieve certificats with associated partenaires sorted by creation date
        $certificats = Certificat::with('partenaire')->orderBy('created_at', 'desc')->get();

        // Return the view 'certificatstem_template' with certificat data
        return view('certificatstem', compact('certificats'));
    }
}
