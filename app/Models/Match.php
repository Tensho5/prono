<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'encounter_date',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_team_id', 'away_team_id', 'league_id', 'encounter_date', 'full_time_home_team_goals', 'full_time_away_team_goals',
        'full_time_results', 'half_time_home_team_goals', 'half_time_away_team_goals', 'half_time_results', 'home_team_shots',
        'away_team_shots', 'home_team_shots_target', 'away_team_shots_target', 'home_team_hit_woodwork', 'away_team_hit_woodwork',
        'home_team_corners', 'away_team_corners', 'home_team_offsides', 'away_team_offsides', 'home_team_fouls', 'away_team_fouls',
        'home_team_free_kicks', 'away_team_free_kicks', 'home_team_yellow_cards', 'away_team_yellow_cards', 'home_team_red_cards',
        'home_team_red_cards', 'home_team_booking_points', 'away_team_booking_points',
    ];
}
