<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function roleView()
    {
        return view("admin.Role.view_role");
    }
    public function roleTambah()
    {
        return view("admin.Role.tambah_role");
    }
    public function roleEdit()
    {
        return view("admin.Role.edit_role");
    }
}
