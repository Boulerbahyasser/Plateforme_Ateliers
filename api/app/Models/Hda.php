<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Hda extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['eff_min', 'eff_max', 'nbr_place_restant'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array<string>
     */
    // protected $with = ['activiteOffre', 'horaire'];

    /**
     * Get the activiteOffre that belongs to the Hda.
     */
    public function activiteOffre(): BelongsToMany
    {
        return $this->belongsToMany(ActiviteOffre::class);
    }

    /**
     * Get the horaire that belongs to the Hda.
     */
    public function horaire(): BelongsToMany
    {
        return $this->belongsToMany(Horaire::class);
    }
}
