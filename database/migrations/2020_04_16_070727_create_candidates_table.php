<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('photo_source');
            $table->unsignedInteger('team_id');
            $table->integer('valid');
            $table->timestamps();

            //Foreign Key with team
            $table->foreign('team_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidates', function (Blueprint $table) {
            if (Schema::hasColumn('candidates', 'team_id')) {
                $table->dropForeign('candidates_team_id_foreign');
                $table->dropColumn('team_id');
            }
        });
        Schema::dropIfExists('candidates');
    }
}
