<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Demande extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pack_id','admin_id', 'date', 'statut'];

    /**
     * Get the admin that owns the demande.
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Administrateur::class);
    }

    /**
     * Get the packs for the demande.
     */
    public function pack(): BelongsTo
    {
        return $this->belongsTo(Pack::class);
    }

    /**
     * Get the enfants for the demande.
     */
    public function enfants(): BelongsToMany
    {
        return $this->belongsToMany(Enfant::class, 'demande_inscriptions', 'demande_id', 'enfant_id');
    }

    /**
     * Get the activite_offres for the demande.
     */
    public function activiteOffres(): BelongsToMany
    {
        return $this->belongsToMany(ActiviteOffre::class, 'demande_inscriptions', 'demande_id', 'activite_offre_id');
    }

    /**
     * Get the devis record associated with the demande.
     */
    public function devis(): HasOne
    {
        return $this->hasOne(Devis::class);
    }
}
