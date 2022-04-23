<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Barber;

class Barber_serviceFactory extends Factory
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
            'name' => 'Corte de '. $this->faker->firstName(),
            'price' => rand(0,99).'.'.rand(0,99),
        ];
    }
}
