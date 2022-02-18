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
        //-----------Create Users----------
        $u = new User();
        $u->name = "admin";
        $u->email = "admin@mail.ru";
        $u->password = bcrypt("12345");
        $u->save();

        //-----------Call Other Seeders----------
        $this->call(LocaleSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(VacanciesSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(OptionSeeder::class);
    }
}
