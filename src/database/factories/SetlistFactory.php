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
        return [
            'title' => $this->faker->name(),
            'comment' => $this->faker->text(50),
            'customEventId' => 1 // 'Neptune Kings'
        ];
    }
}
