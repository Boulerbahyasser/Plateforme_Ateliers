<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_User
 * @property string $Nom
 * @property string $Prenom
 * @property string $Email
 * @property string $Password
 * @property string $Role
 * @property string $created_at
 * @property string $updated_at
 * @property Notification[] $notifications
 * @property Parent[] $parents
 * @property Animateur[] $animateurs
 * @property Administrateur[] $administrateurs
 */
class Utilisateur extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_User';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['Nom', 'Prenom', 'Email', 'Password', 'Role', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification', '"id_User"', '"id_User"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parents()
    {
        return $this->hasMany('App\Models\Parent', '"id_User"', '"id_User"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animateurs()
    {
        return $this->hasMany('App\Models\Animateur', '"id_User"', '"id_User"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function administrateurs()
    {
        return $this->hasMany('App\Models\Administrateur', '"id_User"', '"id_User"');
    }
}
