<?php

use App\Models\League;

use Illuminate\Database\Seeder;

class LeagueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(database_path("./datas/football/leagues/list.json"));
        $leagues = json_decode($file, true);

        foreach($leagues as $league) {
            League::create([
                "name"   => isset($league["name"]) ? $league["name"] : null,
                "code"   => isset($league["code"]) ? $league["code"] : null,
            ]);
        }
    }
}
