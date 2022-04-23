<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barber;
use App\Models\User;

class Barber_testimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_barber' => Barber::inRandomOrder()->first(),
            'name' => User::inRandomOrder()->first()->name,
            'rate' => rand(0,5).'.'.rand(0,9),
            'body' => $this->faker->asciify('**************'),
        ];
    }
}
