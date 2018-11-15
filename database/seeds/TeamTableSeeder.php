<?php

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(database_path("./datas/football/teams/list.json"));
        $teams = json_decode($file, true);

        foreach($teams as $team) {
            Team::create([
                "name"     => $team["title"],
                "code"     => $team["code"],
                "synonyms" => $team["synonyms"],
                "address"  => $team["address"],
                "website"  => $team["web"],
                "since"    => $team["since"]
            ]);
        }
    }
}
