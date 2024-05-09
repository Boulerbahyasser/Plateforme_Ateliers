<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Offre;
use Illuminate\Http\Request;

class adminOffreController extends Controller
{
    public function createOffer(Request $request){
        $formFields = $request->validate([
            'Titre' => 'required',
            'Date_Debut' => 'required|date',
            'Date_Fin' => 'required|date|after:Date_Debut',
            'Description' => 'required',
        ]);
        $formFields['id_Admin'] = auth()->id();
        // $formFields['Date_Creation'] = NOW(); I can use created_at
        if($request->has('remise')) $formFields['remise'] = $request->remise;
        Offre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    public function updateOffer(Request $request,Offre $offre){
        $formFields = $request->validate([
            'Titre' => 'required',
            'Date_Debut' => 'required|date',
            'Date_Fin' => 'required|date|after:Date_Debut',
            'Description' => 'required',

        ]);
        $formFields['ID_Admin'] = auth()->id();
        // $formFields['Date_Creation'] = NOW(); I can use created_at
        if($request->has('remise')) $formFields['remise'] = $request->remise;
        $offre->update($formFields);
        return response()->json(['message'=>'the update was successful'],201);
    }
    public function destroyOffer(Offre $offre)
    {
        ActiviteOffre::where('id_Offre', $offre->id)->delete();
        $offre->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }


}
