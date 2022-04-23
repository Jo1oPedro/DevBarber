<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Barber::factory(10)->create();
        \App\Models\Barber_photo::factory(10)->create();
        \App\Models\Barber_service::factory(10)->create();
        \App\Models\Barber_testimonial::factory(10)->create();
        \App\Models\Barber_availabilitie::factory(10)->create();
    }
}
