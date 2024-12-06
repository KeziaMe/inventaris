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
        // Tambahkan kolom baru untuk kondisi
        Schema::table('barangs', function (Blueprint $table) {
            $table->boolean('baik')->default(false)->after('kondisi_brg');
            $table->boolean('kurang_baik')->default(false)->after('baik');
            $table->boolean('rusak_berat')->default(false)->after('kurang_baik');
        });

        // Pindahkan data dari kondisi_brg ke kolom baru
        DB::table('barangs')->get()->each(function ($barang) {
            $updateData = [
                'baik' => $barang->kondisi_brg === 'Baik',
                'kurang_baik' => $barang->kondisi_brg === 'Kurang Baik',
                'rusak_berat' => $barang->kondisi_brg === 'Rusak Berat',
            ];
            DB::table('barangs')->where('id', $barang->id)->update($updateData);
        });

        // Hapus kolom kondisi_brg setelah migrasi
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn('kondisi_brg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tambahkan kembali kolom kondisi_brg
        Schema::table('barangs', function (Blueprint $table) {
            $table->string('kondisi_brg')->nullable()->after('rusak_berat');
        });

        // Pindahkan data kembali ke kondisi_brg
        DB::table('barangs')->get()->each(function ($barang) {
            $kondisi = null;
            if ($barang->baik) {
                $kondisi = 'Baik';
            } elseif ($barang->kurang_baik) {
                $kondisi = 'Kurang Baik';
            } elseif ($barang->rusak_berat) {
                $kondisi = 'Rusak Berat';
            }
            DB::table('barangs')->where('id', $barang->id)->update(['kondisi_brg' => $kondisi]);
        });

        // Hapus kolom baru
        Schema::table('barangs', function (Blueprint $table) {
            $table->dropColumn(['baik', 'kurang_baik', 'rusak_berat']);
        });
    }
};