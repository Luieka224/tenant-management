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
            $table->foreignId('floor_id')
                ->references('id')
                ->on('floors')
                ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->foreignId('room_type_id')->nullable()
                ->references('id')
                ->on('room_types')
                ->onDelete('set null');
            $table->integer('number');
            $table->integer('no_of_bed');
            $table->float('price');
            $table->boolean('is_available');
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
