<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Activite
 * @property string $Titre
 * @property string $IMAGE_PUB
 * @property string $Description
 * @property string $Lien_Youtube
 * @property string $Objectifs
 * @property string $Domaine
 * @property string $created_at
 * @property string $updated_at
 * @property ActiviteOffre[] $activiteOffres
 * @property PlanningEnf[] $planningEnfs
 * @property PlanningAnim[] $planningAnims
 */
class Activite extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Activite';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['Titre', 'IMAGE_PUB', 'Description', 'Lien_Youtube', 'Objectifs', 'Domaine', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activiteOffres()
    {
        return $this->hasMany('App\Models\ActiviteOffre', '"id_Activite"', '"id_Activite"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningEnfs()
    {
        return $this->hasMany('App\Models\PlanningEnf', '"id_Activite"', '"id_Activite"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningAnims()
    {
        return $this->hasMany('App\Models\PlanningAnim', '"id_Activite"', '"id_Activite"');
    }
}
