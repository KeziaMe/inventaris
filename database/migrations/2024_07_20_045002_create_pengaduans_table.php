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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pengaduan')->nullable();
            $table->string('foto')->nullable();
            $table->string('ket')->nullable();
            $table->string('id_kondisi_brg')->nullable();
            $table->string('nm_status_pengaduan')->nullable();
            $table->string('tgl_masuk')->nullable();
            $table->string('tgl_update')->nullable();
            $table->string('id_inventarisasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
