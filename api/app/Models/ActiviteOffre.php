<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Activite_Offre
 * @property integer $id_Offre
 * @property integer $id_Activite
 * @property float $Tarif
 * @property integer $Age_Min
 * @property integer $Age_Max
 * @property integer $Nbr_Seance
 * @property integer $Volume_Horaire
 * @property string $Option_Paiement
 * @property string $created_at
 * @property string $updated_at
 * @property Hda[] $hdas
 * @property Activite $activite
 * @property Offre $offre
 * @property DemandeInscription[] $demandeInscriptions
 */
class ActiviteOffre extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Activite_Offre';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Offre', 'id_Activite', 'Tarif', 'Age_Min', 'Age_Max', 'Nbr_Seance', 'Volume_Horaire', 'Option_Paiement', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hdas()
    {
        return $this->hasMany('App\Models\Hda', '"id_Activite_Offre"', '"id_Activite_Offre"');
    }

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
    public function offre()
    {
        return $this->belongsTo('App\Models\Offre', '"id_Offre"', 'id_offre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function demandeInscriptions()
    {
        return $this->hasMany('App\Models\DemandeInscription', '"id_Activite_Offre"', '"id_Activite_Offre"');
    }
}
