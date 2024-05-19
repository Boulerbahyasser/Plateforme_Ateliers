<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titre', 'image_pub', 'description', 'lien_youtube', 'objectifs', 'domaine'];

    /**
     * Get the enfants associated with the activite through planning_enfs pivot table.
     */
    public function enfants(): BelongsToMany
    {
        return $this->belongsToMany(Enfant::class, 'planning_enfs', 'activite_id', 'enfant_id');
    }

    /**
     * Get the horaires associated with the activite through planning_anims pivot table.
     */
    public function horaires(): BelongsToMany
    {
        return $this->belongsToMany(Horaire::class, 'planning_anims', 'activite_id', 'horaire_id');
    }

    /**
     * Get the animateurs associated with the activite through planning_anims pivot table.
     */
    public function animateurs(): BelongsToMany
    {
        return $this->belongsToMany(Animateur::class, 'planning_anims', 'activite_id', 'animateur_id');
    }

    /**
     * Get the activiteOffres that belong to the activite.
     */
    public function activiteOffres(): HasMany
    {
        return $this->hasMany(ActiviteOffre::class);
    }
}
