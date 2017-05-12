<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('hotel_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('number')->unsigned();
            $table->date('depart_date');
            $table->date('back_date');
            $table->tinyinteger('day')->unsigned();
            $table->unsignedInteger('price');
            $table->text('schedule');
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
        Schema::dropIfExists('tours');
    }
}
