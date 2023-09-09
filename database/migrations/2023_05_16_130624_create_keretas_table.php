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
        Schema::create('keretas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kereta');
            $table->string('kelas');
            $table->string('slug');
            $table->integer('harga')->max(11);
            $table->unsignedBigInteger('stasiun_from_id');
            $table->time('jam_berangkat');
            $table->unsignedBigInteger('stasiun_to_id');
            $table->time('jam_tujuan');
            $table->timestamps();
            $table->foreign('stasiun_from_id')->references('id')->on('stasiuns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stasiun_to_id')->references('id')->on('stasiuns')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keretas');
    }
};
