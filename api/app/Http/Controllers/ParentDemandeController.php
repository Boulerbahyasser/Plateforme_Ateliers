<?php

namespace App\Http\Controllers;

use App\Models\ActiviteOffre;
use App\Models\Administrateur;
use App\Models\Demande;
use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Notification;
use App\Models\Offre;
use Illuminate\Http\Request;

class ParentDemandeController extends Controller
{
    public function StoreDemande(Request $request){ 
        $demandes = $request->json()->all();
    $activiteoffre=ActiviteOffre::find($demandes[0]->activite_offre_id);
    $offre_id = $activiteoffre->offre_id;
    $admin_id=(Offre::find($offre_id))->admin_id;
    $demande_= Demande::create([ 
    'admin_id'=>  $admin_id,
    'date'=> now() ,
    'statut'=>"valide",
      ]);
      $demande_id = $demande_->id;
      foreach($demandes as $demande){ 
        
      $demandeinsc= DemandeInscription::create(['enfant_id'=> $demande->enfant_id,
      'activite_offre_id'=>$demande->enfant_id,
      'demande_id'=> $demande_id ,
      'horaire1'=> $demande->horaire1,
      'horaire2'=> $demande->horaire2,
      'etat'=>"en cours",
      'motif'=>"",
        ]);
        
        $this->createNotification($admin_id,$demande_id);
      
    }
        
 

    return response()->json(["message"=>"insertion successful"],201);
    }
    public function createNotification($admin_id,$demande_id){
        $user_id =(Administrateur::find($admin_id))->user_id;
        $notofication =Notification::create([
         'date' =>now(),
         'contenu' => 'Demande '.$demande_id.' est bien cree',
         'type'=>'creation de demande'    
        ]);
    
    }
    public function UpdateDevis(Request $request,Devis $devis){ 
        $msg = "votre devis est accepte";
        $devis->update([
        'statut'=>$request->statut
        ]);
        if($request->has('motif')){
            $msg = "votre devis est refuse";
            $devis->update([
            'motif'=>$request->motif
            ]);
        }
        return response()->json(['message'=>$msg,200]);
    }
}

