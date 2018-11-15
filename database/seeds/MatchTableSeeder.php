<?php

use App\Models\Match;
use Illuminate\Database\Seeder;

class MatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedFranceResults();
    }

    protected function seedFranceResults() {
        $file = file_get_contents(database_path("./datas/football/results/france/list.json"));
        $results = json_decode($file, true);

        foreach($results as $result) {
            Match::create([
                "home_team_id"              => null,
                "away_team_id"              => null,
                "league_id"                 => null,
                "encounter_date"            => $result["Date"],
                "full_time_home_team_goals" => $result["FTHG"],
                "full_time_away_team_goals" => $result["FTAG"],
                "full_time_results"         => $result["FTR"],
                "half_time_home_team_goals" => $result["HTHG"],
                "half_time_away_team_goals" => $result["HTAG"],
                "half_time_results"         => $result["HTR"],
                "home_team_shots"           => $result["HS"],
                "away_team_shots"           => $result["AS"],
                "home_team_shots_target"    => $result["HST"],
                "away_team_shots_target"    => $result["AST"],
                "home_team_hit_woodwork"    => $result["HHW"],
                "away_team_hit_woodwork"    => $result["AHW"],
                "home_team_corners"         => $result["HC"],
                "away_team_corners"         => $result["AW"],
                "home_team_fouls"           => $result["HF"],
                "away_team_fouls"           => $result["AF"],
                "home_team_free_kicks"      => $result["HFKC"],
                "away_team_free_kicks"      => $result["AFKC"],
                "home_team_offsides"        => $result["HO"],
                "away_team_offsides"        => $result["AO"],
                "home_team_yellow_cards"    => $result["HY"],
                "away_team_yellow_cards"    => $result["AY"],
                "home_team_red_cards"       => $result["HR"],
                "away_team_red_cards"       => $result["AR"],
                "home_team_booking_points"  => $result["HBP"],
                "away_team_booking_points"  => $result["ABP"]
            ]);
        }
    }
}
