<?php

namespace Database\Seeders;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        //-----------Create Users----------
        $u = new User();
        $u->name = "admin";
        $u->email = "admin@mail.ru";
        $u->password = bcrypt("12345");
        $u->save();


        //-----------Call Other Seeders----------
        $this->call(ProjecstSeeder::class);

    }
}
