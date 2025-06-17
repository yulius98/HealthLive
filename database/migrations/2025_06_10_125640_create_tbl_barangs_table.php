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
        Schema::create('tbl_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_product') -> unique();
            $table->string('image') -> nullable();
            $table->text('description')->nullable();
            $table->enum('discount', ['yes', 'no'])->default('no');
            $table->decimal('harga_diskon',50,2)->nullable();
            $table->decimal('harga',50,2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_barangs');
    }
};