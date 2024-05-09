<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Demande
 * @property integer $id_Admin
 * @property string $Date
 * @property string $Statut
 * @property string $created_at
 * @property string $updated_at
 * @property Devi[] $devis
 * @property Administrateur $administrateur
 * @property DemandeInscription[] $demandeInscriptions
 * @property Pack[] $packs
 */
class Demande extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Demande';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Admin', 'Date', 'Statut', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devis()
    {
        return $this->hasMany('App\Models\Devi', '"id_Demande"', '"id_Demande"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrateur()
    {
        return $this->belongsTo('App\Models\Administrateur', '"id_Admin"', '"id_Admin"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demandeInscriptions()
    {
        return $this->hasMany('App\Models\DemandeInscription', '"id_Demande"', '"id_Demande"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packs()
    {
        return $this->hasMany('App\Models\Pack', '"id_Demande"', '"id_Demande"');
    }
}
