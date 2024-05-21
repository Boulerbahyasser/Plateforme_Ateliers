<?php

namespace App\Http\Controllers;

use App\Models\Enfant;
use App\Models\Father;
use Illuminate\Http\Request;

class EnfantController extends Controller
{     
    
    public function AddEnfant(Request $request){ 
            $id_user=4;
            $father=Father::where('user_id',$id_user)->first();
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'date_naissance' => 'required|date',
                'niveau' => 'required|max:255',
                'photo' => 'nullable|image',
            ]);
            $enfant = new Enfant;
            $enfant->father_id = $father->id;; 
            $enfant->nom = $request->nom;
            $enfant->prenom = $request->prenom;
            $enfant->date_naissance = $request->date_naissance;
            $enfant->niveau = $request->niveau;
        
           if ($request->hasFile('photo')) {
               $path = $request->file('photo')->store('enfants_photos');
               $enfant->photo = $path;
           }
            $enfant->save();
        return response()->json(['message '=>"votre enfant est  ajoute",201]);



}

public function UpdateEnfant(Request $request,Enfant $enfant)
    {    //$enfant=Enfant::findOrFail($id);
           $request->validate([
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'date_naissance' => 'nullable|date',
            'niveau' => 'nullable|string|max:255',
            'photo' => 'nullable|image'
        ]);
        $data=[ 'nom'=>$request->nom,
                'prenom'=> $request->prenom,
                'date_naissance'=> $request->date_naissance,
                'niveau'=>$request->niveau ,];
        
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('enfants_photos');
            $data['photo']= $path; 
        }
      $enfant->update($data);

        return response()->json(['enfant'=>$enfant,'message'=>'Données de l\'enfant mises à jour avec succes.',201]);
    }

    public function DestroyEnfant(Enfant $enfant ){
    $enfant->delete();
    return response()->json(['status'=>"supprimé avec succes",200]);
    }

}
