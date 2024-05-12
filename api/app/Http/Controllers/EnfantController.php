<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use Illuminate\Http\Request;

class EnfantController extends Controller
{
    public function UpdateEnfant(Request $request, string $id)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'niveau' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048', // max:2048 pour limiter la taille de l'image à 2 Mo
        ]);
    
        // Recherche de l'enfant à mettre à jour
        $enfant =Enfant::findOrFail($id);
        // Mettre à jour les données de l'enfant
        $enfant->update([ 'nom'=>$request->nom,
                           'prenom'=> $request->prenom,
                          'date_naissance'=> $request->date_naissance,
                          'niveau'=>$request->niveau ,]);
        
        // Mettre à jour la photo de l'enfant s'il y en a une
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('enfants_photos', 'public');
            $enfant->Photo = $path;
        }
    
        $enfant->save();
    
        return response()->json(['success'=>'Données de l\'enfant mises à jour avec succès.',200]);
    }
    
    public function DestroyEnfant($id){

    $enfant=Enfant::findOrfail($id);
    $enfant->delete();
    return response()->json(['status'=>"supprimé avec succes",200]);
    }

}
