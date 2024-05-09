<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Offre;
use Illuminate\Http\Request;

class adminActiviteeOffreController extends Controller
{
    public function addActivityToOffer(Request $request,Offre $offre,Activite $activitee){
        $formFields = $request->validate([
            'Tarif' => 'required|numeric',
            'Age_Min' => 'required|integer|min:3',
            'Nbr_Seance' => 'required|integer|min:1',
            'Volume_Horaire' => 'required|integer|min:1',
            'Option_Paiement' => 'required',
            'Age_Max' => 'required|integer|min:3'
        ]);
        $formFields['ID_Offre'] = $offre->ID_Offre;
        $formFields['ID_Activitee'] = $activitee->ID_Activitee;
        ActiviteOffre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    public function updateActivityInOffer(Request $request,ActiviteOffre $ativiteOffre){
        $formFields = $request->validate([
            'Tarif' => 'required|numeric',
            'Age_Min' => 'required|integer|min:3',
            'Nbr_Seance' => 'required|integer|min:1',
            'Volume_Horaire' => 'required|integer|min:1',
            'Option_Paiement' => 'required',
            'Age_Max' => 'required|integer|min:3'
        ]);

        $ativiteOffre->update($formFields);
        return response()->json(['message'=>'the update was successful'],201);
    }
    //tested
    public function destroyActivity(ActiviteOffre $activityOffer)
    {
        $activityOffer->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }

}
