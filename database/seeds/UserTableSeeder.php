<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $user = new App\user([
            'email' => "jona506@Outlook.com",
            'user_type_id' => 1,
            'password' => bcrypt("Jona1234&")
        ]);
        $user->save();

        //2
        $user = new App\user([
            'email' => "karo506@Outlook.com",
            'user_type_id' => 1,
            'password' => bcrypt("Karo1234&")
        ]);
        $user->save();

        //3
        $user = new App\user([
            'email' => "luna506@Outlook.com",
            'user_type_id' => 1,
            'password' => bcrypt("Luna1234&")
        ]);
        $user->save();
    }
}
