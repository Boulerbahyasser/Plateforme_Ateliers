<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Father;
use Illuminate\Http\Request;

class EnfantController extends Controller
{     
    
    public function AddEnfant(Request $request){ 
            $id_user=auth()->id;
            $father=Father::where('user_id',$id_user);
            $id_father=$father->id;
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'date_naissance' => 'required|date',
                'niveau' => 'required|max:255',
            ]);
            $enfant = new Enfant;
            $enfant->father_id = $id_father; // Récupérer l'ID du père actuellement connecté
            $enfant->nom = $request->nom;
            $enfant->prenom = $request->prenom;
            $enfant->date_naissance = $request->date_naissance;
            $enfant->niveau = $request->niveau;
            
            // Enregistrez la photo de l'enfant s'il y en a une
            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('enfants_photos', 'public');
                $enfant->photo = $path;
            }
        
            $enfant->save();
             
       
        return response()->json(['message'=>'l\'enfant  est bien ajouté',201]);



}


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
