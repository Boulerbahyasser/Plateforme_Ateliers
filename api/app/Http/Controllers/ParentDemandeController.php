<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Administrateur;
use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Notification;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentDemandeController extends Controller
{
    public function storeDemande(Request $request){
        $demandes = $request->json()->all();
    $activite_offre=ActiviteOffre::find($demandes[0]['activite_offre_id']);
    $offre = Offre::find($activite_offre->offre_id);
    $admin_id = $offre->admin_id;
    $demande_= Demande::create([
    'admin_id'=>  $admin_id,
    'date'=> now(),
    'statut'=>"valide",
      ]);
      $demande_id = $demande_->id;
      foreach($demandes as $demande){
          DB::table('demande_inscriptions')->insert([
          'enfant_id' => $demande['enfant_id'],
          'activite_offre_id' => $demande['activite_offre_id'],
          'demande_id' => $demande_id,
          'horaire1' => $demande['horaire1'],
          'horaire2' => $demande['horaire2'],
          'etat' => "en cours",
          'motif' => ""
      ]);

        $this->createNotification($admin_id,$demande_id);
    }



    return response()->json(["message"=>"insertion successful"],201);
    }
    public function createNotification($admin_id,$demande_id){
        $user =(Administrateur::find($admin_id));
        $user_id = $user->id;
        Notification::create([
          'user_id'=>  $user_id,
         'date' =>now(),
         'contenu' => 'Demande '.$demande_id.' est bien cree',
         'type'=>'creation de demande'
        ]);

    }
}

