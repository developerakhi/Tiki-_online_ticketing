<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Trip;
use Faker\Factory as Faker;
use App\Models\Invoice;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create();
            $location_id = $faker->numberBetween(1, 10);
            $trip_id = $faker->numberBetween(1, 10);
            $invoice = new Invoice();
            if (Trip::find($trip_id) || Location::find($location_id)) {
                $invoice->location_id = $location_id;
                $invoice->trip_id = $trip_id;
                $invoice->save();
            }
        }
    }
}
