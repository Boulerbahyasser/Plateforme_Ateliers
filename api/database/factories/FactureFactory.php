<?php

namespace Database\Factories;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    protected $model = Facture::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTime,
            'total_ht' => $this->faker->randomFloat(2, 100, 1000),
            'total_ttc' => $this->faker->randomFloat(2, 120, 1200),
        ];
    }
}

