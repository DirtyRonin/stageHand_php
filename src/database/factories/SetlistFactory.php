<?php

namespace Database\Factories;

use App\Models\Setlist;
use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\Factory;

class SetlistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $band = Band::where('title','Neptune Kings')->first();
        return [
            'title' => $this->faker->name(),
            'comment' => $this->faker->text(50),
            'bandId' => $band->id
        ];

        // $band = Band::where('title','Neptune Kings')->first();
    }
}
