<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Offre;
use Illuminate\Http\Request;

class AdminActiviteeOffreController extends Controller
{
    //tested
    public function addActivityToOffer(Request $request,Offre $offer,Activite $activity){
        $formFields = $request->validate([
            'tarif' => 'required|numeric',
            'age_min' => 'required|integer|min:3',
            'nbr_seance' => 'required|integer|min:1',
            'volume_horaire' => 'required|integer|min:1',
            'option_paiement' => 'required',
            'age_max' => 'required|integer|min:3'
        ]);
        if($offer->remise) $formFields['tarif_remise'] = $formFields['tarif'] - $formFields['tarif']*$offer->remise;
        $formFields['offre_id'] = $offer->id;
        $formFields['activite_id'] = $activity->id;
        ActiviteOffre::create($formFields);
        return response()->json(['message'=>'the insertion was successful'],201);
    }
    //tested
    public function updateActivityInOffer(Request $request,ActiviteOffre $activityOffer){
        $formFields = $request->validate([
            'tarif' => 'required|numeric',
            'age_min' => 'required|integer|min:3',
            'nbr_seance' => 'required|integer|min:1',
            'volume_horaire' => 'required|integer|min:1',
            'option_paiement' => 'required',
            'age_max' => 'required|integer|min:3'
        ]);

        $activityOffer->update($formFields);
        return response()->json(['message'=>'the update was successful'],200);
    }
    //tested
    public function destroyActivity(ActiviteOffre $activityOffer)
    {
        $activityOffer->delete();
        return response()->json(['message'=>'the delete was successful'],200);
    }

}
