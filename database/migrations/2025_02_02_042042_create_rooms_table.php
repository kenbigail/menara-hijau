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
            $table->json('images')->nullable();
            $table->string('facilities');
            $table->string('contact');
            $table->enum('categories', ['ballroom', 'office room', 'working space']);
            $table->enum('availability', ['available', 'unavailable']);
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
