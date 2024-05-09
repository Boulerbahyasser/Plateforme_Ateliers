<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Devis
 * @property integer $id_Demande
 * @property integer $id_Fact
 * @property string $Date
 * @property float $Totale_HT
 * @property float $Totale_TTC
 * @property string $Statut
 * @property string $Motif
 * @property string $created_at
 * @property string $updated_at
 * @property Demande $demande
 * @property Facture $facture
 */
class Devi extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Devis';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Demande', 'id_Fact', 'Date', 'Totale_HT', 'Totale_TTC', 'Statut', 'Motif', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function demande()
    {
        return $this->belongsTo('App\Models\Demande', '"id_Demande"', '"id_Demande"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facture()
    {
        return $this->belongsTo('App\Models\Facture', '"id_Fact"', '"id_Fact"');
    }
}
