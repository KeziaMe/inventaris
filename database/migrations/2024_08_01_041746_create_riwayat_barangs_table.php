<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kd_brg')->nullable();
            $table->string('nm_brg')->nullable();
            $table->string('kondisi_brg')->nullable();
            $table->string('ket')->nullable();
            $table->string('tgl_masuk')->nullable();
            $table->string('tgl_update')->nullable();
            $table->string('jenis_brg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_barangs');
    }
};
