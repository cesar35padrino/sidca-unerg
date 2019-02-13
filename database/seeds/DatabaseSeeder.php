<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AreaSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(UserSeeders::class);

    }
}
