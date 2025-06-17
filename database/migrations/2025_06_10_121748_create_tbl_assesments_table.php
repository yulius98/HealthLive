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
        Schema::create('tbl_assesments', function (Blueprint $table) {
            $table->id();
            $table->string('kode_assesment')->unique();
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->enum('aktivitas', ['jarang', 'sedang', 'aktif'])->default('jarang');
            $table->enum('alergi',['ya', 'tidak'])->default('tidak');
            $table->enum('hasil', ['overweight', 'normal', 'underweight'])->default('normal')->nullable();
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_assesments');
    }
};