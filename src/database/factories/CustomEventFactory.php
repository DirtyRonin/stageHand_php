<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\CustomEvent;
use App\Models\Song;
use App\Models\Setlist;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CustomEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $bandId = 1; // 'Neptune Kings'
        $locationId = 1;
        $setlist = Setlist::factory()->count(1)->create()->each(function ($setlist) {
            Song::factory()->count(10)->create()->each(function ($song, $key) use ($setlist) {
            $setlist->songs()->attach($song->id, ['order' => $key]);
            });
        });

        return [
            'title' => $this->faker->name(),
            'date' => $this->faker->date(),
            'bandId' => $bandId,
            'setlistId' => $setlist->first()->id,
            'locationId' => $locationId
        ];
    }
}
