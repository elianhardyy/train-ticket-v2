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
        Schema::create('penumpangs', function (Blueprint $table) {
            $table->id();
            $table->string('penumpang');
            $table->string('kategori');
            $table->date('tanggal_pesan');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('stasiun_kereta_id');
            $table->unsignedBigInteger('kereta_id');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('kereta_id')->references('id')->on('keretas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stasiun_kereta_id')->references('id')->on('stasiun_keretas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penumpangs');
    }
};
