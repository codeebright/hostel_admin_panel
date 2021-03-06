<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrnToFoodCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('food_categories', function (Blueprint $table) {
            //
              $table->string('urn')->after('id')->comment('It identify each row');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('food_categories', function (Blueprint $table) {
            //
            $table->dropColumn(['urn']);
        });
    }
}
