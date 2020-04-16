<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->unsignedInteger('team_id');
            $table->integer('votes');
            $table->timestamps();

            //foreign key with team
            $table->foreign('team_id')->references('id')->on('teams');

            //foreign key with room
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('room_teams', function (Blueprint $table) {
            if (Schema::hasColumn('room_teams', 'team_id')) {
                $table->dropForeign('room_teams_team_id_foreign');
                $table->dropColumn('team_id');
            }
            if (Schema::hasColumn('room_teams', 'room_id')) {
                $table->dropForeign('room_teams_room_id_foreign');
                $table->dropColumn('room_id');
            }
        });
        Schema::dropIfExists('room_teams');
    }
}
