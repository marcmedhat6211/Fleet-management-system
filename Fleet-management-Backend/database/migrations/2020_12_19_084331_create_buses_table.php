<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('src_name');
            $table->foreign('src_name')->references('name')->on('stations');
            $table->string('dest_name');
            $table->foreign('dest_name')->references('name')->on('stations');
            
            //seats entity is a week entity --> seats can not exist without a bus
            $table->boolean('seat_1')->default(true);
            $table->boolean('seat_2')->default(true);
            $table->boolean('seat_3')->default(true);
            $table->boolean('seat_4')->default(true);
            $table->boolean('seat_5')->default(true);
            $table->boolean('seat_6')->default(true);
            $table->boolean('seat_7')->default(true);
            $table->boolean('seat_8')->default(true);
            $table->boolean('seat_9')->default(true);
            $table->boolean('seat_10')->default(true);
            $table->boolean('seat_11')->default(true);
            $table->boolean('seat_12')->default(true);

            $table->integer('seats_number')->default(12);
            $table->boolean('availability')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
