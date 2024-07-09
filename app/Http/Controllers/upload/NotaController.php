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
}
