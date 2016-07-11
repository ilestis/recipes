<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->text('ingredients')->nullable();
            $table->time('duration')->nullable();
            $table->tinyInteger('difficulty')->unsigned()->nullable();
            $table->index(array('name', 'difficulty', 'duration'));
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('seasons', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('recipe_season', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->integer('season_id')->unsigned();

            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->foreign('season_id')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recipe_season');
        Schema::drop('seasons');
        Schema::drop('recipes');
    }
}
