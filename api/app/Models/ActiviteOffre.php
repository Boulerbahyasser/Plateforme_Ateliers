<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiviteOffre extends Model
{
    use HasFactory;
    protected $fillable = [
        'offre_id',
        'activite_id',
        'tarif',
        'age_min',
        'age_max',
        'nbr_seance',
        'volume_horaire',
        'option_paiement',
    ];
}
