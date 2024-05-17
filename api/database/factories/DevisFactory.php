<?php

namespace Database\Factories;

use App\Models\Devis;
use Illuminate\Database\Eloquent\Factories\Factory;

class DevisFactory extends Factory
{
    protected $model = Devis::class;

    public function definition(): array
    {
        return [
            'demande_id' => \App\Models\Demande::factory(),
            'facture_id' => \App\Models\Facture::factory()->create()->id,
            'date' => $this->faker->dateTime,
            'totale_ht' => $this->faker->randomFloat(2, 100, 1000),
            'totale_ttc' => $this->faker->randomFloat(2, 120, 1200),
            'statut' => $this->faker->randomElement(['payé', 'non payé']),
            'pdf' => $this->faker->paragraph,
            'etat' => $this->faker->randomElement(['payé', 'non payé']),
            'motif' => $this->faker->paragraph,
        ];
    }
}

