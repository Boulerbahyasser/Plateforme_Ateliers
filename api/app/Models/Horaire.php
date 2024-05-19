<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Horaire extends Model
{
    use HasFactory;
    use HasFactory;

    /**
     * Get the activiteOffres associated with this horaire.
     */
    public function activiteOffres(): BelongsToMany
    {
        return $this->belongsToMany(ActiviteOffre::class, 'hdas', 'horaire_id', 'activite_offre_id');
    }

    /**
     * Get the animateurs associated with this horaire.
     */
    public function animateurs(): BelongsToMany
    {
        return $this->belongsToMany(Animateur::class, 'hdanims', 'horaire_id', 'animateur_id');
    }

    /**
     * Get the enfants associated with this horaire.
     */
    public function enfants(): BelongsToMany
    {
        return $this->belongsToMany(Enfant::class, 'planning_enfs', 'horaire_id', 'enfant_id');
    }

    /**
     * Get the animateurs associated with this horaire through planning_anims pivot table.
     */
    public function animateursPlanning(): BelongsToMany
    {
        return $this->belongsToMany(Animateur::class, 'planning_anims', 'horaire_id', 'animateur_id');
    }


}
