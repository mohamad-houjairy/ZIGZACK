<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'name' => $this->faker->name(),
            'bio' => $this->faker->paragraph(5), // 5 sentences
            'birth_date' => $this->faker->date(),
            // Fake profile image (using pravatar.cc)
            'profile_image' => 'https://i.pravatar.cc/300?img=' . $this->faker->numberBetween(1, 70),
        ];
    }
}
