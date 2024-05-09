<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_offre
 * @property integer $id_Admin
 * @property string $Titre
 * @property string $Date_Debut
 * @property string $Date_Fin
 * @property string $Description
 * @property float $Remise
 * @property string $created_at
 * @property string $updated_at
 * @property ActiviteOffre[] $activiteOffres
 * @property Administrateur $administrateur
 */
class Offre extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_offre';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Admin', 'Titre', 'Date_Debut', 'Date_Fin', 'Description', 'Remise', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activiteOffres()
    {
        return $this->hasMany('App\Models\ActiviteOffre', '"id_Offre"', 'id_offre');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function administrateur()
    {
        return $this->belongsTo('App\Models\Administrateur', '"id_Admin"', '"id_Admin"');
    }
}
