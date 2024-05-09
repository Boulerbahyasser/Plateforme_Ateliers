<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Parent
 * @property integer $id_User
 * @property string $Fonction
 * @property string $created_at
 * @property string $updated_at
 * @property Enfant[] $enfants
 * @property Utilisateur $utilisateur
 */
class Parent extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Parent';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_User', 'Fonction', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enfants()
    {
        return $this->hasMany('App\Models\Enfant', '"id_Parent"', '"id_Parent"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', '"id_User"', '"id_User"');
    }
}
