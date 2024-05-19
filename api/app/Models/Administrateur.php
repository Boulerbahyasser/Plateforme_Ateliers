<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Administrateur extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    /**
     * Get the user associated with the administrator.
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * Get the offers created by the administrator.
     */
    public function offres(): HasMany
    {
        return $this->hasMany(Offre::class);
    }

    /**
     * Get the demands associated with the administrator.
     */
    public function demandes(): HasMany
    {
        return $this->hasMany(Demande::class);
    }


}
