<?php

namespace Database\Seeders;

use App\Models\Band;
use App\Models\User;
use App\Models\Song;
use Illuminate\Database\Seeder;

class BandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Band::factory()
        ->count(10)
        ->has(User::factory()->count(3))
        // ->has(Song::factory()->count(3))
        ->create();
    }
}
