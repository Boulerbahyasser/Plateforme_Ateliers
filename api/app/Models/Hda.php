<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Activite_Offre
 * @property integer $id_Horaire
 * @property integer $Eff_Min
 * @property integer $Eff_Max
 * @property integer $Nbr_Place_Restant
 * @property string $created_at
 * @property string $updated_at
 * @property ActiviteOffre $activiteOffre
 * @property Horaire $horaire
 */
class Hda extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Eff_Min', 'Eff_Max', 'Nbr_Place_Restant', 'created_at', 'updated_at'];

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
    public function horaire()
    {
        return $this->belongsTo('App\Models\Horaire', '"id_Horaire"', '"id_Horaire"');
    }
}
