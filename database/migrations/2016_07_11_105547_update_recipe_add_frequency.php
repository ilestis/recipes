<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateRecipeAddFrequency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function(Blueprint $table) {
            $table->enum('frequency', ['monthly', 'bi-weekly', 'weekly']);
            $table->index('frequency', 'recipe_frequency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function(Blueprint $table) {
            $table->dropIndex('recipe_frequency');
            $table->dropColumn('frequency');
        });
    }
}
