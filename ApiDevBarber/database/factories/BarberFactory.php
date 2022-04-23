<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarberFactory extends Factory
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
            'avatar' => rand(0,4).'.'.'png',
            'stars' => rand(0,4).'.'.rand(0,9),
            'latitude' => '-23.5'.rand(0,9).'30907',
            'longitude' => '-46.6'.rand(0,9).'82795',
        ];
    }
}
