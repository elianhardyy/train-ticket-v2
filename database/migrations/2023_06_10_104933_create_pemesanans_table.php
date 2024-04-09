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
            $table->uuid()->primary();
            $table->string('username');
            $table->string('alamat');
            $table->string('nik');
            $table->integer('harga');
            $table->string('jenis_gerbong');
            $table->string('gerbong');
            $table->dateTime('tanggal');
            $table->string('nomor_kursi');
            $table->string('huruf_kursi');
            $table->enum('status',['unpaid','paid','pending','cancel'])->default('unpaid');
            $table->unsignedBigInteger('penumpang_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('penumpang_id')->references('id')->on('penumpangs');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
