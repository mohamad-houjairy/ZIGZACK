<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'creator_id' => $this->faker->numberBetween(1, 10), // adjust to real creators
            'category_id' => $this->faker->numberBetween(1, 5), // adjust to real categories
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(6),
            'video_url' => 'https://www.youtube.com/watch?v=' . $this->faker->regexify('[A-Za-z0-9_-]{11}'),
            'price' => $this->faker->randomFloat(2, 0, 50),
            'distribution' => $this->faker->randomElement(['public','festival_only','library']),
            'picture' => 'https://picsum.photos/seed/' . $this->faker->unique()->word . '/600/400',
            'production_year' => $this->faker->year(),
            'rating' => $this->faker->randomFloat(1, 1, 5), // 1.0 - 5.0
            'views_count' => $this->faker->numberBetween(100, 50000),
            'duration' => $this->faker->time('H:i:s'),
        ];
    }
}
