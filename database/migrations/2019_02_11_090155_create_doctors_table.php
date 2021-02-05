<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_no')->nullable();
            $table->string('title', 20)->nullable();
            $table->String('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone', 50)->nullable();
            $table->String('gender');
            $table->integer('category_id')->unsigned();;
            $table->integer('user_id')->unsigned();;
            $table->timestamps();


            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('doctors');
    }
}
