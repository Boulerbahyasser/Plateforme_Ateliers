<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DemandeInscription extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['enfant_id', 'activite_offre_id', 'demande_id',
                            'horaire1', 'horaire2', 'etat', 'motif'];

    /**
     * Get the enfant that owns the demande_inscription.
     */
    public function enfant(): BelongsTo
    {
        return $this->belongsTo(Enfant::class);
    }

    /**
     * Get the activite_offre that owns the demande_inscription.
     */
    public function activiteOffre(): BelongsTo
    {
        return $this->belongsTo(ActiviteOffre::class);
    }

    /**
     * Get the demande that owns the demande_inscription.
     */
    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
