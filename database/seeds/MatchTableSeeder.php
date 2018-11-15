<?php

use App\Models\Match;
use App\Models\Team;

use Carbon\Carbon;
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
        $results = array_map('str_getcsv', file(database_path("./datas/football/results/france/F1.csv")));

        array_walk($results, function (&$a) use ($results) {
            $a = array_combine($results[0], $a);
        });
        array_shift($results);

        foreach($results as $result) {
            // $homeTeam = Team::where("name", $result["HomeTeam"])->first();
            // $awayTeam = Team::where("name", $result["AwayTeam"])->first();

            Match::create([
                "home_team_id"              => null,
                "away_team_id"              => null,
                "league_id"                 => null,
                "encounter_date"            => isset($result["Date"]) ? Carbon::createFromFormat('d/m/y', $result["Date"]) : null,
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
                "home_team_hit_woodwork"    => isset($result["HHW"]) ? $result["HHW"] : null,
                "away_team_hit_woodwork"    => isset($result["AHW"]) ? $result["AHW"] : null,
                "home_team_corners"         => isset($result["HC"]) ? $result["HC"] : null,
                "away_team_corners"         => isset($result["AW"]) ? $result["AW"] : null,
                "home_team_fouls"           => isset($result["HF"]) ? $result["HF"] : null,
                "away_team_fouls"           => isset($result["AF"]) ? $result["AF"] : null,
                "home_team_free_kicks"      => isset($result["HFKC"]) ? $result["HKFC"] : null,
                "away_team_free_kicks"      => isset($result["AFKC"]) ? $result["AKFC"] : null,
                "home_team_offsides"        => isset($result["HO"]) ? $result["HO"] : null,
                "away_team_offsides"        => isset($result["AO"]) ? $result["AO"] : null,
                "home_team_yellow_cards"    => isset($result["HY"]) ? $result["HY"] : null,
                "away_team_yellow_cards"    => isset($result["AY"]) ? $result["AY"] : null,
                "home_team_red_cards"       => isset($result["HR"]) ? $result["HR"] : null,
                "away_team_red_cards"       => isset($result["AR"]) ? $result["AR"] : null,
                "home_team_booking_points"  => isset($result["HBP"]) ? $result["HBP"] : null,
                "away_team_booking_points"  => isset($result["ABP"]) ? $result["ABP"] : null
            ]);
        }
    }
}
