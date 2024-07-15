<?php

namespace App\Http\Controllers\upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    //
    public function nota()
    {
        return view("admin.upload.nota");
    }
    public function arsipNota()
    {
        return view("admin.upload.arsip_nota");
    }
    public function detailNota()
    {
        return view("admin.upload.detail_nota");
    }
}
