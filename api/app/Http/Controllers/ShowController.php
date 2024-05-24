<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Activite;
use App\Models\Administrateur;
use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\Hda;
use App\Models\Horaire;
use App\Models\Notification;
use App\Models\Offre;
use App\Models\PlanningEnf;
use App\Models\User;
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
    public function showDemandesOfAdmin() {
        $user_id = auth()->id();
        $admin = Administrateur::where('user_id',$user_id)->first();
        return response()->json(
            Demande::join('demande_inscriptions','demande_inscriptions.demande_id', '=', 'demandes.id')
                ->where('admin_id', $admin->id)
                ->where('statut','valide')
                ->where('etat','en cours')
                ->select('demande.id', 'date')
                ->get(),
            200
        );
    }
//tested
    public function showTopOffers(){
        return response()->json(Offre::orderBy('remise', 'desc')->limit(3)->get(),200);
    }
    public function showRemainingOffers(){
        return response()->json(Offre::orderBy('remise', 'desc')->skip(3)->take(PHP_INT_MAX)->get(),200);
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
            ->where('nbr_place_restant','>',0)
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
        $user_id = auth()->id();
        $parent = Father::where('user_id',$user_id)->first();
        $enfants = Enfant::where('father_id',$parent->id)->first();
        return response()->json([
            $enfants
        ],200);
    }
    public function showTopParentNotifications(){
        $user_id = auth()->id();
        $notifications = Notification::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->limit(7)
            ->get();
        return response()->json($notifications, 200);
    }
    public function showRemainingParentNotifications(){
        $user_id = auth()->id();
        $notifications = Notification::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->skip(7)
            ->take(PHP_INT_MAX)
            ->get();
        return response()->json($notifications,200);
    }
    public function showDemandesOfParent(){
        $user_id = auth()->id();
        $parent = Father::where('user_id',$user_id)->first();
        return response()->json(
            Demande::join('demande_inscriptions','demande_inscriptions.demande_id', '=', 'demandes.id')
                ->join('enfants','demande_inscriptions.enfant_id','enfants.id')
                ->where('father_id',$parent->id)
                ->where('statut','valide')
                ->select('demandes.id', 'date')
                ->get(),
            200
        );
    }
    public function showActivitiesInDemandeOfParent($demande_id){
        $etat = AdminDemandeController::isDemandeVerified($demande_id);
        $demandes = DemandeInscription::where('demande_id',$demande_id)
            ->select('activite_offre_id')
            ->get();
        $i = 0;
        foreach ($demandes as $demande){
        $activities[$i] = ActiviteOffre::join('activites','activites.id','activite_offres.activite_id')
            ->select('activite_offres.id','titre','image_pub','description',
                'lien_youtube','objectifs','domaine')
            ->where('activite_offres.id', $demande->activite_offre_id)->first();
            $activities[$i++]->etat = $etat;
        }
        return response()->json($activities,200);
    }
    public function showEnfantInActivityInDemandeOfParent($demande_id,$activite_offre_id){
        $demandes = DemandeInscription::where('demande_id',$demande_id)
            ->where('activite_offre_id',$activite_offre_id)
            ->select('enfant_id','etat')
            ->get();
        $i = 0;
        foreach ($demandes as $demande){
            $enfants[$i] = Enfant::find($demande->enfant_id);
            $enfants[$i++]->etat = $demande->etat;
        }
        return response()->json($enfants,200);
    }
    public function showPlaningEnfant($enfant_id){
        $plannings = Horaire::join('planning_enfs','horaires.id','=','planning_enfs.horaire_id')
            ->join('activites','activites.id','=','planning_enfs.activite_id')
            ->join('planning_anims','planning_anims.activite_id','=','activites.id')
            ->join('animateurs','animateurs.id','=','planning_anims.anim_id')
            ->join('users','users.id','=','animateurs.user_id')
            ->where('enfant_id',$enfant_id)
            ->select('horaires.jour','horaires.heure_debut','horaires.heure_fin','activites.titre','users.name')
            ->get();
        return response()->json($plannings,200);
    }
}
