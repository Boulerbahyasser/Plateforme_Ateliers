<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeInscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'enfant_id',
        'activite_offre_id',
        'demande_id',
        'horaire1',
        'horaire2',
        'etat',
        'motif',
    ];
}
