<?php

namespace Database\Factories;

use App\Models\CustomEvent;
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

        return [
            'title' => $this->faker->name(),
            'date' => $this->faker->dateTimeBetween("-30 year", now()),
            'bandId' => $bandId,
            'locationId' => $locationId
        ];
    }
}
