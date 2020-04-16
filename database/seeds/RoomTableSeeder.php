<?php

use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $room = new App\room([
            'access_key' => "AS12DXZ",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();

        //2
        $room = new App\room([
            'access_key' => "XCE34TF",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();

        //3
        $room = new App\room([
            'access_key' => "PLO908ZZ",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();

        //4
        $room = new App\room([
            'access_key' => "PLPL90P",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();

        //5
        $room = new App\room([
            'access_key' => "IOLPOI74",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();

        //6
        $room = new App\room([
            'access_key' => "12WQ3E5",
            'user_id' => 1,
            'access_count' => 0,
            'capacity' => 20,
            'valid' => 1
        ]);
        $room->save();
    }
}
