<?php

use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $team = new App\team([
            'name' => "Pin",
            'description' => "This is an organization that wants to help all the people that truly need",
            'logo_source' => "App\Team\1\photo"
        ]);
        $team->save();

        //2
        $team = new App\team([
            'name' => "Moreras",
            'description' => "This is an team that wants to help all the people, making a lot of investigation on the farest towns on Costa Rica",
            'logo_source' => "App\Team\2\photo"
        ]);
        $team->save();

        //3
        $team = new App\team([
            'name' => "Girls",
            'description' => "This is an team that wants to create a new opinion about the politician girls, helping and improving the country",
            'logo_source' => "App\Team\3\photo"
        ]);
        $team->save();
    }
}
