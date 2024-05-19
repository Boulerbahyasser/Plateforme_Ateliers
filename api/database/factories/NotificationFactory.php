<?php

namespace Database\Factories;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'date' => $this->faker->date(),
            'contenu' => $this->faker->paragraph,
            'type' => $this->faker->word,
        ];
    }
}

