<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'factures';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'date',
        'total_ht',
        'total_ttc',
    ];

    /**
     * Get the devis associated with the facture.
     */
    public function devis(): HasMany
    {
        return $this->hasMany(Devis::class);
    }


}
