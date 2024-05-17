<?php

namespace Database\Factories;

use App\Models\Enfant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnfantFactory extends Factory
{
    protected $model = Enfant::class;

    public function definition(): array
    {
        return [
            'father_id' => \App\Models\Father::factory(),
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'date_naissance' => $this->faker->date(),
            'niveau' => $this->faker->randomElement(['Maternelle', 'Primaire', 'Collège']),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}

