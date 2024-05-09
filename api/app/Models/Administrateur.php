<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Admin
 * @property integer $id_User
 * @property string $created_at
 * @property string $updated_at
 * @property Demande[] $demandes
 * @property Offre[] $offres
 * @property Utilisateur $utilisateur
 */
class Administrateur extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Admin';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_User', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demandes()
    {
        return $this->hasMany('App\Models\Demande', '"id_Admin"', '"id_Admin"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offres()
    {
        return $this->hasMany('App\Models\Offre', '"id_Admin"', '"id_Admin"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', '"id_User"', '"id_User"');
    }
}
