<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Offre;
use Illuminate\Http\Request;

class adminOffreController extends Controller
{
    //tested
    public function createOffer(Request $request){
        $formFields = $request->validate([
            'Titre' => 'required',
            'Date_Debut' => 'required|date',
            'Date_Fin' => 'required|date|after:Date_Debut',
            'Description' => 'required',
        ]);
        $formFields['id_Admin'] = auth()->id();
        // $formFields['Date_Creation'] = NOW(); I can use created_at
        if($request->has('Remise')) $formFields['Remise'] = $request->Remise;
        else $formFields['Remise'] = 0;
        Offre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    //tested
    public function updateOffer(Request $request,Offre $offer){
        $formFields = $request->validate([
            'Titre' => 'required',
            'Date_Debut' => 'required|date',
            'Date_Fin' => 'required|date|after:Date_Debut',
            'Description' => 'required',
        ]);
        $formFields['id_Admin'] = auth()->id();
        // $formFields['Date_Creation'] = NOW(); I can use created_at
        if($request->has('Remise')) $formFields['Remise'] = $request->Remise;
        $offer->update($formFields);
        return response()->json(['message'=>'the update was successful'],200);
    }
    //tested
    public function destroyOffer(Offre $offer)
    {
        $offer->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }


}
