<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barber;

class Barber_photoFactory extends Factory
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
            'url' => rand(0,5).'.'.'png',
        ];
    }
}
