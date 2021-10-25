<?php

namespace Database\Seeders;

use App\Models\CustomEvent;
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
        CustomEvent::factory()
        ->count(5)
        ->create();
    }
}
