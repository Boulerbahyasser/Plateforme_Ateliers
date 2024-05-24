<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Hda;
use App\Models\Horaire;
use App\Models\PlanningEnf;
use Illuminate\Http\Request;

class AdminPlanningController extends Controller
{
    static public function insertEnfantInPlanning($lesDevis){
        foreach ($lesDevis as $devis){
            $devis_row = Devis::find($devis->id);
            $demandes = DemandeInscription::where('demande_id',$devis_row->demande_id)
                ->where('etat','accepte')->get();
            foreach ($demandes as $demande){
                $horaire1 = explode(',',$demande->horaire1);
                $horaire2 = explode(',',$demande->horaire2);
                $horaire_id1 = Horaire::where('jour',$horaire1[0])
                    ->where('heure_debut',$horaire1[1])
                    ->where('heure_fin',$horaire1[2])
                    ->first()->id;
                $horaire_id2 = Horaire::where('jour',$horaire2[0])
                    ->where('heure_debut',$horaire2[1])
                    ->where('heure_fin',$horaire2[2])
                    ->first()->id;
                $activite_id =ActiviteOffre::find($demande->activite_offre_id)->activite_id;
                PlanningEnf::create([
                        'enfant_id' => $demande->enfant_id,
                        'activite_id' => $activite_id,
                        'horaire_id' => $horaire_id1,
                ]);
                PlanningEnf::create([
                    'enfant_id' => $demande->enfant_id,
                    'activite_id' => $activite_id,
                    'horaire_id' => $horaire_id2,
                ]);
            }
        }
    }
}
