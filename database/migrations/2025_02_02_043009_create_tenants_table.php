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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_floor')->unsigned();
            $table->bigInteger('id_room')->unsigned();
            $table->string('name_tenant');
            $table->string('email');
            $table->string('phone');
            $table->date('date_start');
            $table->date('date_end');
            $table->enum('status', ['ongoing', 'waiting', 'finished'])->default('waiting');
            $table->timestamps();
            $table->foreign('id_floor')->references('id')->on('floors')->onDelete('cascade');
            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
