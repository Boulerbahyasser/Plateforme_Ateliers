<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Offre;
use Illuminate\Http\Request;

class adminActiviteeOffreController extends Controller
{
    //tested
    public function addActivityToOffer(Request $request,Offre $offer,Activite $activity){
        $formFields = $request->validate([
            'Tarif' => 'required|numeric',
            'Age_Min' => 'required|integer|min:3',
            'Nbr_Seance' => 'required|integer|min:1',
            'Volume_Horaire' => 'required|integer|min:1',
            'Option_Paiement' => 'required',
            'Age_Max' => 'required|integer|min:3'
        ]);
        $formFields['id_Offre'] = $offer->id_offre;
        $formFields['id_Activite'] = $activity->id_Activite;
        ActiviteOffre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    //tested
    public function updateActivityInOffer(Request $request,ActiviteOffre $activityOffer){
        $formFields = $request->validate([
            'Tarif' => 'required|numeric',
            'Age_Min' => 'required|integer|min:3',
            'Nbr_Seance' => 'required|integer|min:1',
            'Volume_Horaire' => 'required|integer|min:1',
            'Option_Paiement' => 'required',
            'Age_Max' => 'required|integer|min:3'
        ]);

        $activityOffer->update($formFields);
        return response()->json(['message'=>'the update was successful'],201);
    }
    //tested
    public function destroyActivity(ActiviteOffre $activityOffer)
    {
        $activityOffer->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }

}
