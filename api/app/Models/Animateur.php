<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Anim
 * @property string $Domaine
 * @property integer $id_User
 * @property string $created_at
 * @property string $updated_at
 * @property HdAnim[] $hdAnims
 * @property Utilisateur $utilisateur
 * @property PlanningAnim[] $planningAnims
 */
class Animateur extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Anim';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['Domaine', 'id_User', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hdAnims()
    {
        return $this->hasMany('App\Models\HdAnim', '"id_Anim"', '"id_Anim"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', '"id_User"', '"id_User"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function planningAnims()
    {
        return $this->hasMany('App\Models\PlanningAnim', '"id_Anim"', '"id_Anim"');
    }
}
