<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'image_pub',
        'description',
        'lien_youtube',
        'objectifs',
        'domaine',
    ];
}
