<?php

namespace Database\Seeders;

use App\Models\User;
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
            'email' => "mein@penis.de",
            'password' => bcrypt("WnH_Wk<PUS.a!Hn0"),
            'isAdmin' => 1
        ]);
        $visitor = User::create([
            'name' => "visitor",
            'email' => "visitor@visitor.de",
            'password' => bcrypt("visitor"),
            'isAdmin' => 0
        ]);

        $user->bands()->attach(\App\Models\Band::create(['title' => "Neptune Kings"]));
        $user->bands()->attach(\App\Models\Band::create(['title' => "MotorHead"]));
        $user->bands()->attach(\App\Models\Band::create(['title' => "Major Lazor"]));
        
        $visitor->bands()->attach(\App\Models\Band::create(['title' => "My Top 40 Band"]));
        $visitor->bands()->attach(\App\Models\Band::create(['title' => "Garage Band"]));
        $visitor->bands()->attach(\App\Models\Band::create(['title' => "Theater Group"]));
    }
}
