<?php

use App\Models\Match;
use App\Models\Team;
use App\Models\League;

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
        $results = [];
        $path = database_path("./datas/football/results/");
        $files = array_diff(scandir($path), ["..", "."]);

        foreach ($files as $file) {
            $results = array_map('str_getcsv', file($path.$file));
            array_walk($results, function (&$a) use ($results) {
                $a = array_combine($results[0], $a);
            });
            array_shift($results);
            $this->seedResults($results);
        }
    }


    protected function seedResults($results) {
        foreach($results as $result) {
            if (isset($result["HomeTeam"]) || isset($result["AwayTeam"]) || isset($results["Div"])) continue;

            $league = League::whereCode($result["Div"])->first();
            $homeTeam = Team::whereName($result["HomeTeam"])->first();
            $awayTeam = Team::whereName($result["AwayTeam"])->first();

            Match::create([
                "home_team_id"              => !is_null($homeTeam) ? $homeTeam->id : null,
                "away_team_id"              => !is_null($awayTeam) ? $awayTeam->id : null,
                "league_id"                 => !is_null($league) ? $league->id : null,
                "encounter_date"            => isset($result["Date"]) ? Carbon::createFromFormat('d/m/y', $result["Date"]) : null,
                "full_time_home_team_goals" => isset($result["FTHG"]) ? $result["FTHG"] : null,
                "full_time_away_team_goals" => isset($result["FTAG"]) ? $result["FTAG"] : null,
                "full_time_results"         => isset($result["FTR"]) ? $result["FTR"] : null,
                "half_time_home_team_goals" => isset($result["HTHG"]) ? $result["HTHG"] : null,
                "half_time_away_team_goals" => isset($result["HTAG"]) ? $result["HTAG"] : null,
                "half_time_results"         => isset($result["HTR"]) ? $result["HTR"] : null,
                "home_team_shots"           => isset($result["HS"]) ? $result["HS"] : null,
                "away_team_shots"           => isset($result["AS"]) ? $result["AS"] : null,
                "home_team_shots_target"    => isset($result["HST"]) ? $result["HST"] : null,
                "away_team_shots_target"    => isset($result["AST"]) ? $result["AST"] : null,
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
