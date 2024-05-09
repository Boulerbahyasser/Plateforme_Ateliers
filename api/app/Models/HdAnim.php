<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_Anim
 * @property integer $id_Horaire
 * @property string $created_at
 * @property string $updated_at
 * @property Animateur $animateur
 * @property Horaire $horaire
 */
class HdAnim extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animateur()
    {
        return $this->belongsTo('App\Models\Animateur', '"id_Anim"', '"id_Anim"');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function horaire()
    {
        return $this->belongsTo('App\Models\Horaire', '"id_Horaire"', '"id_Horaire"');
    }
}
