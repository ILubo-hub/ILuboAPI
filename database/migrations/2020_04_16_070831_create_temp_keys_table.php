<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_id');
            $table->string('temp_key');
            $table->timestamps();

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
        Schema::table('temp_keys', function (Blueprint $table) {
            if (Schema::hasColumn('temp_keys', 'room_id')) {
                $table->dropForeign('temp_keys_room_id_foreign');
                $table->dropColumn('room_id');
            }
        });
        Schema::dropIfExists('temp_keys');
    }
}
