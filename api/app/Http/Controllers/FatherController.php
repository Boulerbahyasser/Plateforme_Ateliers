<?php

namespace App\Http\Controllers;

use App\Models\Father;
use App\Models\Offre;
use App\Models\User;
use Illuminate\Http\Request;

class FatherController extends Controller
{
   public function UpdateFather(Request $request)
    {
         $request->validate([
           'password' => 'required|string|min:6',
            'function' => 'nullable|string|max:255',
         ]);
         $id_user=auth()->id; 
        $user= User::find($id_user);
        $user->update(['password' => $request->password]);
        $parent =Father::where('user_id',$id_user)->firstOrFail();
        $parent->update(['fonction' => $request->function]);
        return response()->json(['statut'=>"Modifie avec succes",200]);
}
     public function DestroyParent()
     {
          $user_id=auth()->id; 
          $user= User::find($user_id);
          
          $user->delete();
          

          return response()->json(['message'=>'Parent supprimé avec succès.',200]);    
    }
}
