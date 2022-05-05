<?php

namespace Database\Seeders;

use App\Models\CustomEvent;
use App\Models\Setlist;
use App\Models\Song;
use Illuminate\Database\Seeder;

class CustomEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomEvent::factory()->count(5)->create()->each(function ($customEvent) {
            Setlist::factory()->count(1)->create()->each(function ($setlist, $setlistId) use ($customEvent) {
                $setlist->update(['customEventId' => $customEvent->id]);
                Song::inRandomOrder()->limit(25)->get()->each(function ($song, $key) use ($setlist) {
                    $setlist->songs()->attach($song->id, ['order' => $key + 1]);
                });
                // Song::factory()->count(10)->create()->each(function ($song, $key) use ($setlist) {
                //     $setlist->songs()->attach($song->id, ['order' => $key + 1]);
                // });
            });
        });



        // $setlist = Setlist::factory()->count(1)->create()->each(function ($setlist) {
        //     Song::factory()->count(10)->create()->each(function ($song, $key) use ($setlist) {
        //     $setlist->songs()->attach($song->id, ['order' => $key]);
        //     });
        // });


    }
}
