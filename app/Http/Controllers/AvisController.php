<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    
        // 1. Enregistrer un nouvel avis
        public function store(Request $request, $activiteId)
        {
            $request->validate([
                'contenu' => 'required|string',
            ]);
    
            $activite = Activite::findOrFail($activiteId);
    
            $avis = new Avis();
            $avis->contenu = $request->contenu;
            $avis->activite_id = $activite->id;
            $avis->save();
    
            return redirect()->route('activites.show', $activite->id)->with('success', 'Avis ajouté avec succès');
        }
    
        // 2. Supprimer un avis
        public function destroy($id)
        {
            $avis = Avis::findOrFail($id);
            $avis->delete();
    
            return redirect()->route('activites.show', $avis->activite_id)->with('success', 'Avis supprimé avec succès');
        }
    
    
}
