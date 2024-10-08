<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire; // Ensure this model exists

class PartenaireController extends Controller
{
    public function index()
    {
        // Retrieve the most recent partenaires first
        $partenaires = Partenaire::orderBy('created_at', 'desc')->get();

        // Return the view with the partenaires
        return view('partenaires', compact('partenaires')); // Corrected variable name to match the data passed
    }

    public function create()
    {
        return view('createPartenaire');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email|max:255', // Validation for email
            'adresse' => 'required|string|max:255', // Validation for adresse
            'telephone' => 'required|string|max:15', // Validation for telephone
            'type' => 'required|string|in:hebergement,transport,activite', // Validation for type
        ]);

        // Create a new partenaire
        Partenaire::create($request->only(['nom', 'description', 'email', 'adresse', 'telephone', 'type'])); // Include all fields

        return redirect()->route('partenaires.index')->with('success', 'Partenaire ajouté avec succès.'); // Corrected the route name
    }

    public function show($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return view('partenaire', compact('partenaire')); // Assuming you have a single partenaire view named 'partenaire.blade.php'
    }

    public function edit($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return view('editPartenaire', compact('partenaire'));
    }

    public function update(Request $request, $id)
    {
        $partenaire = Partenaire::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'email' => 'required|email|max:255', // Validation for email
            'adresse' => 'required|string|max:255', // Validation for adresse
            'telephone' => 'required|string|max:15', // Validation for telephone
            'type' => 'required|string|in:hebergement,transport,activite', // Validation for type
        ]);

        // Update the partenaire
        $partenaire->update($request->only(['nom', 'description', 'email', 'adresse', 'telephone', 'type'])); // Include all fields

        return redirect()->route('partenaires.index')->with('success', 'Partenaire mis à jour avec succès!'); // Corrected the route name
    }

    public function destroy($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        $partenaire->delete();

        return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès'); // Corrected the route name
    }

    public function partenaireStem()
    {
        $partenaires = Partenaire::orderBy('created_at', 'desc')->get();
        return view('partenaireStem', compact('partenaires')); // Assuming you want to display all partenaires
    }
}
