<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pack extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['demande_id', 'nom', 'remise'];

    /**
     * Get the demande that owns the pack.
     */
    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
