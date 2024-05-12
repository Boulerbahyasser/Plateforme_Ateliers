<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use Illuminate\Http\Request;

class adminDemandeController extends Controller{
    public function gererDemande(Request $request){
        $demandeInsc = DemandeInscription::where('enfant_id', $request->enfant_id)
            ->where('activite_offre_id', $request->activite_offre_id)
            ->where('demande_id', $request->demande_id)
            ->first();
        $demandeInsc->statut = $request->statut;
        $demandeInsc->save();
        $msg = ($request->statut == 'accepte')?"the request is well accepted"
                                                    :"the request is well denied";
        return response()->json(['message'=>$msg],200);
    }
}
