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
        Schema::create('stasiun_keretas', function (Blueprint $table) {
            $table->id();
            $table->time('jam_kereta_from');
            $table->time('jam_kereta_to');
            $table->unsignedBigInteger('stasiun_from_id');
            $table->unsignedBigInteger('stasiun_to_id');
            $table->unsignedBigInteger('kereta_id');
            $table->foreign('stasiun_from_id')->references('id')->on('stasiuns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stasiun_to_id')->references('id')->on('stasiuns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kereta_id')->references('id')->on('keretas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stasiun_keretas');
    }
};
