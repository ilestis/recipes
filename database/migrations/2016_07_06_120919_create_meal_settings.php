<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_settings', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('monday_lunch');
            $table->boolean('monday_evening');
            $table->boolean('tuesday_lunch');
            $table->boolean('tuesday_evening');
            $table->boolean('wednesday_lunch');
            $table->boolean('wednesday_evening');
            $table->boolean('thursday_lunch');
            $table->boolean('thursday_evening');
            $table->boolean('friday_lunch');
            $table->boolean('friday_evening');
            $table->boolean('saturday_lunch');
            $table->boolean('saturday_evening');
            $table->boolean('sunday_lunch');
            $table->boolean('sunday_evening');
            $table->timestamps();

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
        Schema::drop('user_settings');
    }
}
