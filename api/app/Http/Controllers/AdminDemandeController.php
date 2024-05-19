<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDemandeController extends Controller{
    public function gererDemande(Request $request,$demande_id,$activite_offre_id,$enfant_id){
        DemandeInscription::sqlUpdate($request,$demande_id,$activite_offre_id,$enfant_id);
        $msg = ($request->etat == 'accepte')?"the request is well accepted"
            :"the request is well denied";

        if(AdminDemandeController::isDemandeVerified($demande_id)) {
            NotificationController::notifyDemandeHandled($demande_id);
            AdminDemandeController::createDevis($demande_id);
        }
        return response()->json(['message'=>$msg],200);

    }
    public function isDemandeVerified($demande_id){
        $demandeInscriptions = DB::table('demande_inscriptions')
            ->where('demande_id', $demande_id)
            ->get();
        $result = true;
        foreach ($demandeInscriptions as $demandeInscription)
            if($demandeInscription->etat == 'en cours') $result = false;
        return $result;

    }
    public function createDevis($demande_id){
        $activiteOffreIds = DB::table('demande_inscriptions')
            ->where('demande_id', $demande_id)
            ->where('etat','accepte')
            ->pluck('activite_offre_id');
        $totale_ht = 0;
        foreach( $activiteOffreIds as $activiteOffreId){
            $activiteOffre = ActiviteOffre::find($activiteOffreId);
            $totale_ht+=$activiteOffre->tarif_remise;
        }
        $demande = Demande::find($demande_id);
        if($demande->pack_id) {
            $pack = $demande->packs();
            return response()->json($pack,200);
            $totale_ht = $totale_ht + ($totale_ht * ($pack->remise / 100));
        }
        $totale_ttc = $totale_ht + ($totale_ht*(11/100)); // (tva = 11%)
        $date = now();
        $pdf = PDFController::generatePDF($demande_id,$date,$totale_ht,$totale_ttc);
        $devis = Devis::create([
            'demande_id'=>$demande_id,
            'date'=>$date,
            'totale_ht'=>$totale_ht,
            'totale_ttc'=>$totale_ttc,
            'pdf'=>$pdf,
            'statut'=>'en cours',
            'etat'=>'non paye'
        ]);
        NotificationController::notifyDevisCreated($demande_id,$devis);
    }
}
