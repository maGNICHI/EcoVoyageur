<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use App\Models\Reponse;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    public function store(Request $request, Reclamation $reclamation)
{
  
    $request->validate([
        'message' => 'required',
    ]);

    Reponse::create([
        'message' => $request->message,
        'reclamation_id' => $reclamation->id,
    ]);

    return redirect()->route('reclamations.show', $reclamation->id)->with('success', 'Réponse ajoutée avec succès.');
}


    public function destroy(Reclamation $reclamation, Reponse $reponse)
    {
        $reponse->delete();
        return redirect()->route('reclamations.show', $reclamation->id)->with('success', 'Réponse supprimée avec succès.');
    }
}
