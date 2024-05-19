<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Devis extends Model
{
    use HasFactory;
    protected $table = 'devis';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['demande_id', 'facture_id', 'date'
                            , 'totale_ht', 'totale_ttc', 'statut','Pdf','Etat', 'motif'];
    
    /**
     * Get the demande that owns the devis.
     */
    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }

    /**
     * Get the facture associated with the devis.
     */
    public function facture(): BelongsTo
    {
        return $this->belongsTo(Facture::class);
    }
}
