<?php

namespace Database\Factories;

use App\Models\Pack;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackFactory extends Factory
{
    protected $model = Pack::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'remise' => $this->faker->randomFloat(2, 0, 50),
        ];
    }
}

