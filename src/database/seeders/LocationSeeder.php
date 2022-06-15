<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name' => 'Arena',
            'address' => 'Gelsenkirchen'
        ]);
        Location::create([
            'name' => 'Paladium',
            'address' => 'Köln'
        ]);
        Location::create([
            'name' => 'Hotel Shanghai',
            'address' => 'Essen'
        ]);
    }
}
