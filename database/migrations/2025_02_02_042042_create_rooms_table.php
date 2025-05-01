<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_floor');
            $table->string('name_room');
            $table->string('images')->nullable();
            $table->text('facilities');
            $table->string('contact');
            $table->string('size');
            $table->enum('categories', ['ballroom', 'office room', 'working space']);
            $table->enum('corner', ['south', 'north', 'east', 'west']);
            $table->enum('availability', ['available', 'unavailable']);
            $table->string('grid_col');
            $table->string('grid_row');
            $table->timestamps();
            $table->foreign('id_floor')->references('id')->on('floors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
