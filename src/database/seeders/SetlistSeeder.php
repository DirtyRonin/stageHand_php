<?php

namespace Database\Seeders;

use App\Models\Setlist;
use App\Models\Song;
use App\Models\Band;
use Illuminate\Database\Seeder;

class SetlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // return Setlist::factory()
        //     ->count(25)
        //     ->hasAttached(
        //         Song::factory()
        //             ->count(25),
        //             ['order' => 0 ]
        //     )
        //     ->create();

        
//Now in customEvents
        // Setlist::factory()->count(1)->create()->each(function ($setlist) {
        //     Song::factory()->count(10)->create()->each(function ($song, $key) use ($setlist) {
        //     $setlist->songs()->attach($song->id, ['order' => $key]);
        //     });
        // });
    }
}
