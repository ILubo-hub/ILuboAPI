<?php

use Illuminate\Database\Seeder;

class Temp_KeyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Main
        $user_type = new App\user_type([
            'description' => "Main"
        ]);
        $user_type->save();
    }
}
