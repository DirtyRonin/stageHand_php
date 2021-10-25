<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Band;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "admin",
            'email' => "admin@admin.de",
            'password' => bcrypt("admin")
        ]);


        

        $band = \App\Models\Band::create(['title' => "Neptune Kings"]);

        for ($i=0; $i <50 ; $i++) { 
            $band->songs()->attach(\App\Models\Song::factory()->create());
        }

        $user->bands()->attach($band);
        $user->bands()->attach(\App\Models\Band::create(['title' => "MotorHead"]));
        $user->bands()->attach(\App\Models\Band::create(['title' => "Major Lazor"]));

        User::factory()
        ->count(10)
        ->has(Band::factory()->count(1))
        ->create();
    }
}
