<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Enfant
 * @property integer $id_Activite
 * @property integer $id_Horaire
 * @property string $created_at
 * @property string $updated_at
 * @property Activite $activite
 * @property Enfant $enfant
 * @property Horaire $horaire
 */
class PlanningEnf extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activite()
    {
        return $this->belongsTo('App\Models\Activite', '"id_Activite"', '"id_Activite"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enfant()
    {
        return $this->belongsTo('App\Models\Enfant', '"id_Enfant"', '"id_Enfant"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horaire()
    {
        return $this->belongsTo('App\Models\Horaire', '"id_Horaire"', '"id_Horaire"');
    }
}
