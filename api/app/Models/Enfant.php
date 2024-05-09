<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Enfant
 * @property integer $id_Parent
 * @property string $Nom
 * @property string $Prenom
 * @property string $Date_Naissance
 * @property string $Niveau
 * @property string $Photo
 * @property string $created_at
 * @property string $updated_at
 * @property Parent $parent
 * @property DemandeInscription[] $demandeInscriptions
 * @property PlanningEnf[] $planningEnfs
 */
class Enfant extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Enfant';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Parent', 'Nom', 'Prenom', 'Date_Naissance', 'Niveau', 'Photo', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\Parent', '"id_Parent"', '"id_Parent"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demandeInscriptions()
    {
        return $this->hasMany('App\Models\DemandeInscription', '"id_Enfant"', '"id_Enfant"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningEnfs()
    {
        return $this->hasMany('App\Models\PlanningEnf', '"id_Enfant"', '"id_Enfant"');
    }
}
