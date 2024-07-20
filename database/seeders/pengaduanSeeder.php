<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('pengaduans')->insert([
            'tgl_pengaduan' => '1 Oktober 2001',
            'ket' => 'ini ket',
            'tgl_masuk' => '2 Oktober 2001',
            'tgl_update' => '3 Oktober 2001',
        ]);
    }
}
