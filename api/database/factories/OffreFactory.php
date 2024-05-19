<?php

namespace Database\Factories;

use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    protected $model = Offre::class;

    public function definition(): array
    {
        return [
            'admin_id' => \App\Models\Administrateur::factory(),
            'titre' => $this->faker->sentence,
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'description' => $this->faker->paragraph,
            'remise' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}

