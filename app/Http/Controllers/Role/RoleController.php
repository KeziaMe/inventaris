<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function roleView()
    {
        $data['allDataRole'] = Role::all();
        return view("admin.Role.view_role", $data);
    }
}
