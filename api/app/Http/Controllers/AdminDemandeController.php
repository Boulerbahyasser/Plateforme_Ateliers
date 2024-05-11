<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use Illuminate\Http\Request;

class adminDemandeController extends Controller
{
    public function gererDemande(Request $request){
        $demandeInsc = DemandeInscription::find($request->id_Enfant,$request->id_Activite_Offre,$request->id_Demande);
        if($request->statut=='accepte') $demandeInsc->statut = 'accepte';
        elseif($request->statut=='refuse') $demandeInsc->statut = 'refuse';
        $demandeInsc->save();
        return response()->json(['message'=>'the request is well processed'],200);
    }
}
