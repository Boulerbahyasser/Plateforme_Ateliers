<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Enfant
 * @property integer $id_Activite_Offre
 * @property integer $id_Demande
 * @property string $Horaire1
 * @property string $Horaire2
 * @property string $Etat
 * @property string $Motif
 * @property string $created_at
 * @property string $updated_at
 * @property ActiviteOffre $activiteOffre
 * @property Demande $demande
 * @property Enfant $enfant
 */
class DemandeInscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Horaire1', 'Horaire2', 'Etat', 'Motif', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activiteOffre()
    {
        return $this->belongsTo('App\Models\ActiviteOffre', '"id_Activite_Offre"', '"id_Activite_Offre"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function demande()
    {
        return $this->belongsTo('App\Models\Demande', '"id_Demande"', '"id_Demande"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enfant()
    {
        return $this->belongsTo('App\Models\Enfant', '"id_Enfant"', '"id_Enfant"');
    }
}
