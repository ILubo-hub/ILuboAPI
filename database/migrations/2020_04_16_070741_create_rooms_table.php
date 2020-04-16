<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_key');
            $table->unsignedInteger('user_id');
            $table->integer('access_count');
            $table->integer('capacity');
            $table->integer('valid');
            $table->timestamps();

            //foreign key with users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rooms', function (Blueprint $table) {
            if (Schema::hasColumn('rooms', 'user_id')) {
                $table->dropForeign('rooms_user_id_foreign');
                $table->dropColumn('user_id');
            }
        });
        Schema::dropIfExists('rooms');
    }
}
