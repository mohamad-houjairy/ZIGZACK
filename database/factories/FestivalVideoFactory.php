<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FestivalVideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'video_id' => \App\Models\Video::where('distribution', 'festival_only')->inRandomOrder()->first()->id,
            'starting_date' => $this->faker->dateTimeBetween('-1 years', '+1 months')->format('Y-m-d'),
            'ending_date' => $this->faker->dateTimeBetween('+1 months', '+6 months')->format('Y-m-d'),
            'location' => $this->faker->city,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'organizer_name' => $this->faker->name,
            'organizer_phone' => $this->faker->phoneNumber,
        ];
    }
}
