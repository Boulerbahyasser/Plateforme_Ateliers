<?php

namespace App\Http\Controllers;

use App\Models\DemandeInscription;
use App\Models\Devis;
use App\Models\Enfant;
use App\Models\Father;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    static public function notifyDevisCreated($demande_id,Devis $devis){
        $enfant_id =(DB::table('demande_inscriptions')
            ->where('demande_id', $demande_id)
            ->first(['enfant_id']))->enfant_id;
        $enfant = Enfant::find($enfant_id);
        $parent_id = $enfant->father_id;
        $parent = Father::find($parent_id);
        $user_id = $parent->user_id;
        Notification::create([
            'user_id'=>  $user_id,
            'date' =>now(),
            'contenu' => 'Vous avez une nouvelle devis :'.$devis->id,
            'type'=>'nouveau devis'
        ]);
    }
    static public function notifyDemandeHandled($demande_id){
        $enfant_id =(DB::table('demande_inscriptions')
            ->where('demande_id', $demande_id)
            ->first(['enfant_id']))->enfant_id;
        $enfant = Enfant::find($enfant_id);
        $parent_id = $enfant->father_id;
        $parent = Father::find($parent_id);
        $user_id = $parent->user_id;
        Notification::create([
            'user_id'=>  $user_id,
            'date' =>now(),
            'contenu' => 'La demande '.$demande_id.' a été traitée avec succès',
            'type'=>'traitement de demande'
        ]);
    }

}
