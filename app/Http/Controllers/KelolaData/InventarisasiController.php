<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventarisasi;

class InventarisasiController extends Controller
{
    //

    public function inventarisasiView()
    {
        $data['allDataInventarisasi'] = Inventarisasi::all();
        return view("admin.kelola_data.inventarisasi.view_inventarisasi", $data);
    }
}
