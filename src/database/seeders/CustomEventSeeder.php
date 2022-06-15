<?php

namespace Database\Seeders;

use App\Models\CustomEvent;
use App\Models\Setlist;
use App\Models\Song;
use App\Models\Band;
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

        $max = strtotime(now());
        $min = strtotime("-30 year", $max);



        foreach (Band::all() as $band) {

            $locationId = rand(1, 3);

            for ($i = 1; $i <= 6; $i++) {

                $value = rand($min, $max);
                $date = date('Y-m-d', $value);

                $customEvent = CustomEvent::create([
                    'title' => 'SummerEvent ' . $date,
                    'date' => $date,
                    'bandId' => $band->id,
                    'locationId' => $locationId
                ]);
                $setlist = Setlist::create([
                    'title' => $this->generateSelistName($customEvent),
                    'comment' => "a very nice comment",
                    'customEventId' => $customEvent->id,

                ]);

                Song::inRandomOrder()->limit(25)->get()->each(function ($song, $key) use ($setlist) {
                    $setlist->songs()->attach($song->id, ['order' => $key + 1]);
                });
            }
        }



        /*
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
*/


        // $setlist = Setlist::factory()->count(1)->create()->each(function ($setlist) {
        //     Song::factory()->count(10)->create()->each(function ($song, $key) use ($setlist) {
        //     $setlist->songs()->attach($song->id, ['order' => $key]);
        //     });
        // });


    }

    private function generateSelistName($customEvent)
    {
        $customEventDate = date('Y.M.d', strtotime($customEvent->date));
        return $customEvent->title . ' :: ' . $customEvent->band->title . ' :: ' . $customEvent->location->name . ' :: ' . $customEventDate;
    }
}
