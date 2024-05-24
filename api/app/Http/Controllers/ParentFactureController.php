<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Enfant;
use App\Models\Facture;
use App\Models\Father;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ParentFactureController extends Controller
{
    public function createFacture()
    {
        $user_id = 79;
        $parent = Father::where('user_id', $user_id)->first();
        $lesDevis = Devis::join('demandes', 'devis.demande_id', '=', 'demandes.id')
            ->join('demande_inscriptions', 'demandes.id', '=', 'demande_inscriptions.demande_id')
            ->join('enfants', 'demande_inscriptions.enfant_id', '=', 'enfants.id')
            ->where('father_id', $parent->id)
            ->where('devis.statut', 'accepte')
            ->select('devis.id','totale_ht','totale_ttc')
            ->get();
        // $enfant=Enfant::where('parent_id',$parent->id);
        // $demande_ins=DemandeInscription::where('enfant_id',$enfant->id);
        // $demande=Demande::where('id',$demande_ins->demande_id);
        // $devises=Devis::where('demande_id',$demande->id);
        $tot_ht = 0;
        $tot_ttc = 0;
        foreach ($lesDevis as $devis) {
            $tot_ht += $devis->totale_ht;
            $tot_ttc += $devis->totale_ttc;
        }


        $facture = Facture::create(['date' => now(),
            'total_ht' => $tot_ht,
            'total_ttc' => $tot_ttc]);
        foreach ($lesDevis as $devis) {
            $devis_row = Devis::find($devis->id);
            $devis_row->update(['etat'=>'paye',
                'facture_id'=>$facture->id]);
        }
        AdminPlanningController::insertEnfantInPlanning($lesDevis);

        return response()->json(['message'=>'the facture has been created'],201);
    }
}
