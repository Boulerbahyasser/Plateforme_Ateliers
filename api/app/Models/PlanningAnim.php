<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanningAnim extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planning_anims';

    /**
     * Indicates if the model's primary key is composite.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The primary key associated with the table.
     *
     * @var array
     */
    protected $primaryKey = ['anim_id', 'activite_id', 'horaire_id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'anim_id' => 'integer',
        'activite_id' => 'integer',
        'horaire_id' => 'integer',
    ];

    /**
     * Get the animator that belongs to the planning.
     */
    public function animateur(): BelongsTo
    {
        return $this->belongsTo(Animateur::class, 'anim_id');
    }

    /**
     * Get the activity that belongs to the planning.
     */
    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class, 'activite_id');
    }

    /**
     * Get the schedule that belongs to the planning.
     */
    public function horaire(): BelongsTo
    {
        return $this->belongsTo(Horaire::class, 'horaire_id');
    }
}
