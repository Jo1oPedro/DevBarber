<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Barber;

class Barber_availabilitieFactory extends Factory
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
            'weekday' => $this->faker->dayOfWeek(),
            'hours' => $this->faker->time(),
        ];
    }
}
