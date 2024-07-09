<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function userView()
    {
        $data['allDataUser'] = User::all();
        return view("admin.user.view_user", $data);
    }

    public function userTambah()
    {
        return view("admin.user.tambah_user");
    }

    public function userEdit()
    {
        return view("admin.user.edit_user");
    }
}
