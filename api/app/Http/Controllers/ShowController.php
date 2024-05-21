<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Administrateur;
use App\Models\Demande;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\Hda;
use App\Models\Notification;
use App\Models\Offre;
use App\Models\PlanningEnf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    //tested
    public function showActivities(){

        return response()->json(Activite::latest()->get(),200);
    }
    // tested
    // we dont need to filter the offers according to the id_admin
    public function showOffers(){
        return response()->json(Offre::latest()->get(),200);
    }
    public function showOffer(Offre $offre){
        return response()->json($offre,200);
    }
// 1/2 tested
    public function showDemandes() {
        $user_id = auth()->id();
        $admin = Administrateur::where('user_id',$user_id)->get();
        return response()->json(
            Demande::join('demande_inscriptions','demande_inscriptions.demande_id', '=', 'demandes.id')
                ->where('admin_id', $admin->id)
                ->where('statut','valide')
                ->where('etat','en cours')
                ->select('id', 'date')
                ->get(),
            200
        );
    }
//tested
    public function showTopOffers(){
        return response()->json(Offre::orderBy('remise', 'desc')->limit(3)->get(),200);
    }
    public function showRemainingOffers(){
        return response()->json(Offre::orderBy('remise', 'desc')->skip(3)->get(),200);
    }
    public function showActivitiesOfferInOffer(Offre $offer){

        $activities = ActiviteOffre::where('offre_id', $offer->id)->latest()->get();
        return response()->json($activities,200);
    }
    public function showActivitiesInOfferAllInfos(Offre $offer){
        $activities = ActiviteOffre::join('activites','activites.id','activite_offres.activite_id')
                                    ->select('activite_offres.id','titre','image_pub','description',
                                        'lien_youtube','objectifs','domaine',
                                        'tarif','tarif_remise','age_min','age_max','nbr_seance',
                                        'volume_horaire','option_paiement')
                                    ->where('offre_id', $offer->id)->get();
        return response()->json($activities,200);
    }
    public function showActivitiesInOffer(Offre $offer){
        $activities = ActiviteOffre::join('activites','activites.id','activite_offres.activite_id')
            ->select('activite_offres.id','titre','image_pub','description',
                'lien_youtube','objectifs','domaine')
            ->where('offre_id', $offer->id)->get();
        return response()->json($activities,200);
    }

    public function showHoraireInActivity($activite_id){
        $results = HDA::join('horaires', 'hdas.horaire_id', '=', 'horaires.id')
            ->where('activite_offre_id', $activite_id)
            ->select('jour', 'heure_debut', 'heure_fin','nbr_place_restant','eff_max','eff_min')
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
    public function showEnfantOfParent(){
        $user_id = 35;
        $parent = Father::where('user_id',$user_id)->first();
        $enfants = Enfant::where('father_id',$parent->id)->first();
        return response()->json([
            $enfants


        ],200);
    }
    public function showTopParentNotification(){
        $user_id = 35;
        $notifications = Notification::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get();
        return response()->json($notifications, 200);
    }
    public function showRemainingParentNotification(){
        $user_id = auth()->id();
        return response()->json(Notification::where('user_id',$user_id)->orderby('date')->skip(7)->latest()->get(),200);
    }
}
