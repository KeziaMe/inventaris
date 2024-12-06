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
        Schema::table('barangs', function (Blueprint $table) {
            // Menambahkan kolom jumlah
            $table->string('jumlah')->default(0);

            // Menghapus kolom tgl_masuk dan tgl_update
            $table->dropColumn(['tgl_masuk', 'tgl_update']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            // Menghapus kolom jumlah
            $table->dropColumn('jumlah');

            // Menambahkan kembali kolom yang dihapus
            $table->string('tgl_masuk')->nullable();
            $table->string('tgl_update')->nullable();
        });
    }
};