<?php

namespace Database\Factories;

use App\Models\Band;
use App\Models\CustomEvent;
use App\Models\Location;
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

        $band = Band::where('title', 'Neptune Kings')->first();


        $setlistCount = Band::find($band->id)->withCount('setlists')->first();
        

        $locationCount = count(Location::all());

        return [
            'date'=> $this->faker->date(),
            'bandId' => $band->id,
            'setlistId' => rand(1, $setlistCount->setlists_count),
            'locationId' => rand(1, $locationCount)
        ];
    }
}
