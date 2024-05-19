<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActiviteOffre extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['offre_id', 'activite_id', 'tarif','tarif_remise', 'age_min',
                            'age_max', 'nbr_seance', 'volume_horaire', 'option_paiement'];

    /**
     * Get the offre that owns the activite_offre.
     */
    public function offre(): BelongsTo
    {
        return $this->belongsTo(Offre::class);
    }

    /**
     * Get the activite that owns the activite_offre.
     */
    public function activite(): BelongsTo
    {
        return $this->belongsTo(Activite::class);
    }
}
