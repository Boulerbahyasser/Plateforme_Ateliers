<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Offre extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['admin_id', 'titre','date_debut', 'date_fin', 'description', 'remise'];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'remise' => 'decimal:2',
    ];
    public function administrateur(): BelongsTo
    {
        return $this->belongsTo(Administrateur::class, 'admin_id');
    }

    /**
     * Get the activities that belong to the offer.
     */
    public function activiteOffres(): HasMany
    {
        return $this->hasMany(ActiviteOffre::class);
    }
}


