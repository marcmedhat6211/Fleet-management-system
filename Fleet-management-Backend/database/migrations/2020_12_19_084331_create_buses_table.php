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
            $table->unsignedBigInteger('src_id');
            $table->foreign('src_id')->references('id')->on('stations');
            $table->unsignedBigInteger('dest_id');
            $table->foreign('dest_id')->references('id')->on('stations');
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
