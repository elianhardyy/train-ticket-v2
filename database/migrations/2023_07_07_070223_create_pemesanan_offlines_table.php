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
        Schema::create('pemesanan_offlines', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('gerbong');
            $table->string('kursi');
            $table->unsignedBigInteger('kereta_id');
            $table->unsignedBigInteger('stasiun_kereta_id');
            $table->foreign('kereta_id')->references('id')->on('keretas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stasiun_kereta_id')->references('id')->on('stasiun_keretas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan_offlines');
    }
};
