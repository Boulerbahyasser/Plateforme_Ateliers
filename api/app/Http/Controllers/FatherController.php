<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;

class FatherController extends Controller
{
   public function UpdateEnfant(Request $request)
    {

         //Valider les données du formulaire
         $request->validate([
           'password' => 'required|string|min:6',
            'function' => 'nullable|string|max:255',
         ]);
         $id_user=auth()->id; //id de user actuellement authentifie
       // Recherche de l'utilisateur avec l'id_user spécifié
        $user= User::find($id_user);
        // Mise à jour du mot de passe de l'utilisateur
        $user->update(['password' => $request->password]);
    
    
        // Recherche du parent associé à l'utilisateur avec l'id_parent spécifié
        $parent =Father::where('user_id',$id_user)->firstOrFail();
        // Mise à jour de la fonction du parent
        $parent->update(['fonction' => $request->function]);
    
        // Redirection avec un message de succès
        return response()->json(['statut'=>'Modifié avec succès.',200]);
}
     public function DestroyParent()
       {
 
    //Suppression du parent
    $user_id=1;
    $user= User::find(2);
    $parent=Father::where('user_id', $user_id)->firstOrFail();
    $user->delete();
     $parent->delete();
    return response()->json(['success'=>'Parent supprimé avec succès.',200]);    
    }
}
