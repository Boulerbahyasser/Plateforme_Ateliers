<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use Illuminate\Http\Request;


class AdminDemandeController extends Controller{
    public function gererDemande(Request $request,$demande_id,$activite_offre_id,$enfant_id){
        DemandeInscription::sqlUpdate($request,$demande_id,$activite_offre_id,$enfant_id);
        $msg = ($request->etat == 'accepte')?"the request is well accepted"
                                :"the request is well denied";
        return response()->json(['message'=>$msg],200);
    }
}
