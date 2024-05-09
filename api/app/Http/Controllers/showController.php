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
    public function showDemande() {

        return response()->json(
            Demande::where('id_Admin', auth()->id())
                ->where('Statut','En cours')
                ->select('id_Demande', 'Date','Statut')
                ->latest()
                ->get(),
            200
        );
    }
//tested
    public function showActivitiesInOffer(Offre $offer){

        $activities = ActiviteOffre::where('id_Offre', $offer->id_offre)->latest()->get();
        return response()->json($activities,200);
    }

    public function showHoraireInActivity($id_Activite){
        $results = HDA::join('horaires', 'hdas.id_Horaire', '=', 'horaires.id_Horaire')
            ->select('jour', 'Heure_Debut', 'Heure_Fin')
            ->where('id_Activite_Offre', $id_Activite)
            ->get();
        return response()->json($results,200);
    }
    //tested
    public function showEnfantInActivity($id_Activite){
        $results = Enfant::join('planning_enfs', 'enfants.id_Enfant', '=', 'planning_enfs.id_Enfant')
            ->select('enfants.id_Enfant', 'enfants.id_Parent', 'enfants.Nom', 'enfants.Prenom', 'enfants.Date_Naissance', 'enfants.Niveau', 'enfants.Photo')
            ->where('planning_enfs.id_Activite', '=', $id_Activite)
            ->get();
        return response()->json($results,200);
    }
}
