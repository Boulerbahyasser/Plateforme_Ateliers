<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Administrateur;
use App\Models\Offre;
use Illuminate\Http\Request;

class AdminOffreController extends Controller
{
    //tested
    public function createOffer(Request $request){
        $formFields = $request->validate([
            'titre' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:Date_Debut',
            'description' => 'required',
        ]);
        $user_id = auth()->id();
        $admin = Administrateur::where('user_id',$user_id)->first();
        $formFields['admin_id'] = $admin->id;

        if($request->has('remise')) $formFields['remise'] = $request->remise;
        else $formFields['remise'] = 0;
        Offre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    //tested
    public function updateOffer(Request $request,Offre $offer){
        $formFields = $request->validate([
            'titre' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:Date_Debut',
            'description' => 'required',
        ]);

        if($request->has('remise')) $formFields['remise'] = $request->remise;
        $offer->update($formFields);
        return response()->json(['message'=>'the update was successful'],200);
    }
    //tested
    public function destroyOffer(Offre $offer){
        $offer->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }


}
