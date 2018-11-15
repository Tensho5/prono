<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('home_team_id')->nullable();
            $table->unsignedInteger('away_team_id')->nullable();
            $table->unsignedInteger('league_id')->nullable();
            $table->date('encounter_date')->nullable();
            $table->unsignedTinyInteger('full_time_home_team_goals')->nullable();
            $table->unsignedTinyInteger('full_time_away_team_goals')->nullable();
            $table->enum('full_time_results', ['H', 'D', 'A'])->nullable();
            $table->unsignedTinyInteger('half_time_home_team_goals')->nullable();
            $table->unsignedTinyInteger('half_time_away_team_goals')->nullable();
            $table->enum('half_time_results', ['H', 'D', 'A'])->nullable();
            $table->unsignedTinyInteger('home_team_shots')->nullable();
            $table->unsignedTinyInteger('away_team_shots')->nullable();
            $table->unsignedTinyInteger('home_team_shots_target')->nullable();
            $table->unsignedTinyInteger('away_team_shots_target')->nullable();
            $table->unsignedTinyInteger('home_team_hit_woodwork')->nullable();
            $table->unsignedTinyInteger('away_team_hit_woodwork')->nullable();
            $table->unsignedTinyInteger('home_team_free_kicks')->nullable();
            $table->unsignedTinyInteger('away_team_free_kicks')->nullable();
            $table->unsignedTinyInteger('home_team_corners')->nullable();
            $table->unsignedTinyInteger('away_team_corners')->nullable();
            $table->unsignedTinyInteger('home_team_offsides')->nullable();
            $table->unsignedTinyInteger('away_team_offsides')->nullable();
            $table->unsignedTinyInteger('home_team_fouls')->nullable();
            $table->unsignedTinyInteger('away_team_fouls')->nullable();
            $table->unsignedTinyInteger('home_team_yellow_cards')->nullable();
            $table->unsignedTinyInteger('away_team_yellow_cards')->nullable();
            $table->unsignedTinyInteger('home_team_red_cards')->nullable();
            $table->unsignedTinyInteger('away_team_red_cards')->nullable();
            $table->unsignedTinyInteger('home_team_booking_points')->nullable();
            $table->unsignedTinyInteger('away_team_booking_points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
