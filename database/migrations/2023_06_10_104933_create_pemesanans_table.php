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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('alamat');
            $table->string('nik');
            $table->integer('harga');
            $table->string('gerbong');
            $table->dateTime('tanggal');
            $table->string('nomor_kursi');
            $table->string('status')->default('belum');
            $table->unsignedBigInteger('penumpang_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('penumpang_id')->references('id')->on('penumpangs');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
