<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Pack
 * @property integer $id_Demande
 * @property string $Nom
 * @property float $Remise
 * @property string $created_at
 * @property string $updated_at
 * @property Demande $demande
 */
class Pack extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Pack';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_Demande', 'Nom', 'Remise', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function demande()
    {
        return $this->belongsTo('App\Models\Demande', '"id_Demande"', '"id_Demande"');
    }
}
