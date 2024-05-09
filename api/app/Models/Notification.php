<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Notif
 * @property integer $id_User
 * @property string $Date
 * @property string $Contenu
 * @property string $Object
 * @property string $Type
 * @property string $created_at
 * @property string $updated_at
 * @property Utilisateur $utilisateur
 */
class Notification extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Notif';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_User', 'Date', 'Contenu', 'Object', 'Type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo('App\Models\Utilisateur', '"id_User"', '"id_User"');
    }
}
