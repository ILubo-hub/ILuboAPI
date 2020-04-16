<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            User_typeTableSeeder::class,
            UserTableSeeder::class,
            TeamTableSeeder::class,
            CandidateTableSeeder::class,
            RoomTableSeeder::class,
            Room_TeamsTableSeeder::class,
        ]);
    }
}
