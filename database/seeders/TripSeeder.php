<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use Faker\Factory as Faker;
class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        for($i = 0; $i < 10; $i++){
            $faker = Faker::create();
            $trip = new Trip();
            $trip->buss_name = $faker->name();
            $trip->fare = $faker->numberBetween(300,2000);
            $trip->available_seats = $faker->numberBetween(5,36);
            $trip->save();
        }
       
    }
}
