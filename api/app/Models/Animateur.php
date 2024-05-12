<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animateur extends Model
{
    use HasFactory;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['domaine', 'user_id'];

    /**
     * Get the user that owns the animateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the horaires associated with the animateur.
     */
    public function horaires(): BelongsToMany
    {
        return $this->belongsToMany(Horaire::class, 'hdanims', 'animateur_id', 'horaire_id');
    }

    /**
     * Get the activites associated with the animateur through planning_anims pivot table.
     */
    public function activiteshoraires(): BelongsToMany
    {
        return $this->belongsToMany(Activite::class, 'planning_anims', 'animateur_id', 'activite_id');
    }
}
