<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HdAnim extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [];

    /**
     * Get the animateurs that belong to the HdAnim.
     */
    public function animateurs(): BelongsToMany
    {
        return $this->belongsToMany(Animateur::class);
    }

    /**
     * Get the horaires that belong to the HdAnim.
     */
    public function horaires(): BelongsToMany
    {
        return $this->belongsToMany(Horaire::class);
    }
}
