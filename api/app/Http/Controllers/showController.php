<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Demande;
use App\Models\Enfant;
use App\Models\Offre;
use App\Models\PlanningEnf;
use Illuminate\Http\Request;

class showController extends Controller
{
    //tested
    public function showActivities(){

        return response()->json(Activite::latest()->get(),200);
    }
    // 1/2 tested
    public function showOffer(){
        return response()->json(Offre::latest()->where('id_Admin', auth()->id())->get(),200);
    }
    public function showOfferParent(){
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
    public function showActivitiesOfOffer(Offre $offer){

        $activities = ActiviteOffre::where('id_Offre', $offer->id_offre)->latest()->get();
        return response()->json($activities,200);
    }
    //showHorairesOfactivitiesincludedInAnOffer
    public function showEnfantOfActivitieIncludedInAnOffer($id_Activite){
        $results = Enfant::join('planning_enfs', 'enfants.id_Enfant', '=', 'planning_enf.id_Enfant')
            ->select('enfants.id_enfant', 'enfants.id_parent', 'enfants.Nom', 'enfants.Prenom', 'enfants.dateNaissance', 'enfants.Niveau', 'enfants.Photo')
            ->where('planning_enf.id_Activité', '=', $id_Activite)
            ->latest()
            ->get();
        return response()->json($results,200);
    }
}
