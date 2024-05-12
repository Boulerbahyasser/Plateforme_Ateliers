<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    use HasFactory;
    protected $fillable = [
        'father_id',
        'nom',
        'prenom',
        'date_naissance',
        'niveau',
        'photo'
    ];
}
