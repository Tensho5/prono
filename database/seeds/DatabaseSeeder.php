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
        $this->call(CountryTableSeeder::class);
        $this->call(LeagueTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(MatchTableSeeder::class);
    }
}
