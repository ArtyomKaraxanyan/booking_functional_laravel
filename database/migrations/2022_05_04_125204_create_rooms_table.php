<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
//            $table->integer('number');
            $table->text('description');
            $table->integer('price');
            $table->string('type');
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')
                ->references('id')->on('hotels')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('bad');
            $table->integer('room_size');
            $table->integer('bathroom');
            $table->integer('guest_count');
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
        Schema::dropIfExists('rooms');
    }
};
