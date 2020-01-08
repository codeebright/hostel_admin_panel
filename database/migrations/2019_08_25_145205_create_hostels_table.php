<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('hostels', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('user_id');
          $table->string('name');
          $table->string('phone',12);
          $table->string('email',12);
          $table->string('description');
          $table->string('type');
          $table->string('website',12)->nullable();
          $table->string('fb')->nullable();
          $table->integer('file_id');
          $table->string('remark');
          $table->softDeletes();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostels');
    }
}
