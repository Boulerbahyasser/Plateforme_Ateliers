<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\Hda;
use App\Models\Horaire;
use App\Models\Notification;
use App\Models\Pack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDemandeController extends Controller{
    public function gererDemande(Request $request,$demande_id,$activite_offre_id,$enfant_id){
        $demande = DemandeInscription::where('enfant_id', $enfant_id)
            ->where('activite_offre_id', $activite_offre_id)
            ->where('demande_id', $demande_id)
            ->update([
                'etat' => $request->etat,
                'motif' => $request->motif,
                'updated_at' => now()
            ]);
        $demande = DemandeInscription::where('enfant_id', $enfant_id)
            ->where('activite_offre_id', $activite_offre_id)
            ->where('demande_id', $demande_id)->first();
        //return response()->json($demande,200);
        if($request->etat == 'accepte')$msg = "the request is well accepted";
        else {

            $horaire1 = explode(',',$demande->horaire1);
            $horaire2 = explode(',',$demande->horaire2);
            $horaire1_id = Horaire::where('jour',$horaire1[0])->where('heure_debut',$horaire1[1])
                ->where('horaires.heure_fin',$horaire1[2])->first()->id;
            $horaire2_id = Horaire::where('jour',$horaire2[0])->where('heure_debut',$horaire2[1])
                ->where('horaires.heure_fin',$horaire2[2])->first()->id;
            $hda1 = Hda::find($horaire1_id);
            $hda2 = Hda::find($horaire2_id);
            $hda1->update(['nbr_place_restant'=>$hda1->nbr_place_restant+1]);
            $hda2->update(['nbr_place_restant'=>$hda2->nbr_place_restant+1]);
            $msg = "the request is well denied";
        }
        $parent_id  = Enfant::find($enfant_id)->father_id;
        $parent= Father::find($parent_id);
        $user = User::find($parent->user_id);
        if(AdminDemandeController::isDemandeVerified($demande_id)) {
            NotificationController::notifyDemandeHandled($demande_id);
            AdminDemandeController::createDevis($demande_id,$user);
        }
        return response()->json(['message'=>$msg],200);

    }
    static public function isDemandeVerified($demande_id){
        $demandeInscriptions = DB::table('demande_inscriptions')
            ->where('demande_id', $demande_id)
            ->get();
        $result = true;
        foreach ($demandeInscriptions as $demandeInscription)
            if($demandeInscription->etat == 'en cours') $result = false;
        return $result;

    }
    public function createDevis($demande_id,$user){
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
            $pack = Pack::find($demande->pack_id);
            //return response()->json($pack,200);
            $totale_ht = $totale_ht + ($totale_ht * ($pack->remise / 100));
        }
        $totale_ttc = $totale_ht + ($totale_ht*(11/100)); // (tva = 11%)
        $date = now();
        $pdf = PDFController::generatePDF($demande_id,$date,$totale_ht,$totale_ttc,$user);
        $devis = Devis::create([
            'demande_id'=>$demande_id,
            'date'=>$date,
            'totale_ht'=>$totale_ht,
            'totale_ttc'=>$totale_ttc,
            'pdf'=>$pdf,
            'statut'=>'en cours',
            'etat'=>'non paye'
        ]);
        //$devis = Devis::where('demande_id',$demande_id)->first();
            NotificationController::notifyDevisCreated($demande_id,$devis);
    }
}
