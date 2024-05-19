<?php

namespace Database\Factories;

use App\Models\Father;
use Illuminate\Database\Eloquent\Factories\Factory;

class FatherFactory extends Factory
{
    protected $model = Father::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'fonction' => $this->faker->jobTitle,
        ];
    }
}
