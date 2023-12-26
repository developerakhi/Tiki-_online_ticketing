<?php

namespace Database\Seeders;


use App\Models\Trip;
use App\Models\Location;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create();
            $trip_id = $faker->numberBetween(1, 10);

            if (Trip::find($trip_id)) {
                $location = new Location();
                $location->trip_id = $trip_id;
                $location->Dpt_time = $faker->dateTime();
                $location->Arr_time = $faker->dateTime();
                $location->starting_point = $faker->name();
                $location->ending_point = $faker->name();
                $location->save();
            }
        }
    }
}
