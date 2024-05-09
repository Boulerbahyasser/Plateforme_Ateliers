<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Horaire
 * @property string $jour
 * @property string $Heure_Debut
 * @property string $Heure_Fin
 * @property string $created_at
 * @property string $updated_at
 * @property HdAnim[] $hdAnims
 * @property Hda[] $hdas
 * @property PlanningEnf[] $planningEnfs
 * @property PlanningAnim[] $planningAnims
 */
class Horaire extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Horaire';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['jour', 'Heure_Debut', 'Heure_Fin', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hdAnims()
    {
        return $this->hasMany('App\Models\HdAnim', '"id_Horaire"', '"id_Horaire"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hdas()
    {
        return $this->hasMany('App\Models\Hda', '"id_Horaire"', '"id_Horaire"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningEnfs()
    {
        return $this->hasMany('App\Models\PlanningEnf', '"id_Horaire"', '"id_Horaire"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningAnims()
    {
        return $this->hasMany('App\Models\PlanningAnim', '"id_Horaire"', '"id_Horaire"');
    }
}
