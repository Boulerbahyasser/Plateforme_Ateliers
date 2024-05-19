<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlanningEnf extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'planning_enfs';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['enfant_id', 'activite_id', 'horaire_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enfant_id' => 'integer',
        'activite_id' => 'integer',
        'horaire_id' => 'integer',
    ];

    /**
     * Get the enfant that belongs to the planning.
     *
     */
    public function enfant(): BelongsTo
    {
        return $this->belongsTo(Enfant::class);
    }

    /**
     * Get the activite that belongs to the planning.
     *
     */
    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }

    /**
     * Get the horaire that belongs to the planning.
     *
     */
    public function horaire(): BelongsTo
    {
        return $this->belongsTo(Horaire::class);
    }
}
