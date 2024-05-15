<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enfant extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['father_id', 'nom', 'prenom', 'date_naissance', 'niveau', 'photo'];

    /**
     * Get the father that owns the enfant.
     */
    public function father(): BelongsTo
    {
        return $this->belongsTo(Father::class);
    }
}
