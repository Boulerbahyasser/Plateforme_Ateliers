<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Demande;
use App\Models\Enfant;
use App\Models\Hda;
use App\Models\Offre;
use App\Models\PlanningEnf;
use Illuminate\Http\Request;

class showController extends Controller
{
    //tested
    public function showActivities(){

        return response()->json(Activite::latest()->get(),200);
    }
    // tested
    // we dont need to filter the offers according to the id_admin
    public function showOffer(){
        return response()->json(Offre::latest()->get(),200);
    }
// 1/2 tested
    public function showDemandes() {

        return response()->json(
            Demande::join('demande_inscriptions','demande_inscriptions.demande_id', '=', 'demandes.id')
                ->where('admin_id', auth()->id())
                ->where('statut','valide')
                ->where('etat','en cours')
                ->select('id', 'date')
                ->get(),
            200
        );
    }
//tested
    public function showActivitiesInOffer(Offre $offer){

        $activities = ActiviteOffre::where('offre_id', $offer->id)->latest()->get();
        return response()->json($activities,200);
    }

    public function showHoraireInActivity($activite_id){
        $results = HDA::join('horaires', 'hdas.horaire_id', '=', 'horaires.id')
            ->select('jour', 'heure_debut', 'heure_fin')
            ->where('activite_offre_id', $activite_id)
            ->get();
        return response()->json($results,200);
    }
    //tested
    public function showEnfantInActivity($activite_id){
        $results = Enfant::join('planning_enfs', 'enfants.id', '=', 'planning_enfs.enfant_id')
            ->select('enfants.id', 'enfants.father_id', 'enfants.nom', 'enfants.prenom',
                'enfants.date_naissance', 'enfants.niveau', 'enfants.photo')
            ->where('planning_enfs.activite_id', '=', $activite_id)
            ->get();
        return response()->json($results,200);
    }
}
