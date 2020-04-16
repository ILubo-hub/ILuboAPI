<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->unsignedInteger('user_type_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();

            //Foreign key with user_type
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'user_type_id')) {
                $table->dropForeign('users_user_type_id_foreign');
                $table->dropColumn('user_type_id');
            }
        });
        Schema::dropIfExists('users');
    }
}
