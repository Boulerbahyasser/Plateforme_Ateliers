<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DemandeInscription extends Model
{
    use HasFactory;
    static public function sqlUpdate(Request $request,$demande_id,$activite_offre_id,$enfant_id){
        DB::update('UPDATE demande_inscriptions SET etat = ?, motif = ?, updated_at = ? WHERE enfant_id = ? AND activite_offre_id = ? AND demande_id = ?', [
            $request->etat,
            $request->motif,
            now(),
            $enfant_id,
            $activite_offre_id,
            $demande_id
        ]);
    }


}
