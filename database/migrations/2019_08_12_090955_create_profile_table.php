<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('email', 30)->unique();
            $table->string('mobile_number')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->integer('user_department')->nullable();
            $table->integer('user_designation')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        /*assign foreign keys*/
        Schema::table('profile', function($table)
        {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_department')->references('id')->on('departments');
            $table->foreign('user_designation')->references('id')->on('designations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
