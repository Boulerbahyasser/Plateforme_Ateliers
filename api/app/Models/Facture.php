<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Fact
 * @property string $created_at
 * @property string $updated_at
 * @property Devi[] $devis
 */
class Facture extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_Fact';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devis()
    {
        return $this->hasMany('App\Models\Devi', '"id_Fact"', '"id_Fact"');
    }
}
