<?php

use Illuminate\Database\Seeder;

class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //First Team
        //1
        $candidate = new \App\candidate([
            'name' => "Isaac",
            'lastname' => "Rodriguez Matturen",
            'photo_source' => "App/photo/Isaac",
            'team_id' => 1,
            'valid' => 1
        ]);
        $candidate->save();
        //2
        $candidate = new \App\candidate([
            'name' => "Maikol",
            'lastname' => "Soro Lopez",
            'photo_source' => "App/photo/Maikol",
            'team_id' => 1,
            'valid' => 1
        ]);
        $candidate->save();
        //3
        $candidate = new \App\candidate([
            'name' => "Adrian",
            'lastname' => "Mejia Perez",
            'photo_source' => "App/photo/Adrian",
            'team_id' => 1,
            'valid' => 1
        ]);
        $candidate->save();

        //Second Team
        //1
        $candidate = new \App\candidate([
            'name' => "Karolay",
            'lastname' => "Morera García",
            'photo_source' => "App/photo/Karolay",
            'team_id' => 2,
            'valid' => 1
        ]);
        $candidate->save();
        //2
        $candidate = new \App\candidate([
            'name' => "Oscar",
            'lastname' => "Morera Hernandez",
            'photo_source' => "App/photo/Oscar",
            'team_id' => 2,
            'valid' => 1
        ]);
        $candidate->save();
        //3
        $candidate = new \App\candidate([
            'name' => "Mary",
            'lastname' => "García Álvarez",
            'photo_source' => "App/photo/Mary",
            'team_id' => 2,
            'valid' => 1
        ]);
        $candidate->save();

        //Thirt Team
        //1
        $candidate = new \App\candidate([
            'name' => "Susan",
            'lastname' => "Alvarado López",
            'photo_source' => "App/photo/Susan",
            'team_id' => 3,
            'valid' => 1
        ]);
        $candidate->save();
        //2
        $candidate = new \App\candidate([
            'name' => "Paola",
            'lastname' => "Delgado Solís",
            'photo_source' => "App/photo/Paola",
            'team_id' => 3,
            'valid' => 1
        ]);
        $candidate->save();
        //3
        $candidate = new \App\candidate([
            'name' => "Maureen",
            'lastname' => "Chacon Álvarez",
            'photo_source' => "App/photo/Maureen",
            'team_id' => 3,
            'valid' => 1
        ]);
        $candidate->save();
    }
}
