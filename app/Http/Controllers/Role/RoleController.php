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

    public function roleTambah()
    {
        return view("admin.Role.tambah_role");
    }

    public function roleStore(Request $request)
    {
        $validateData = $request->validate([
            'textRole' => 'required',

        ]);

        $data = new Role();
        $data->role = $request->textRole;
        $data->save();

        return redirect()->route('role.view');
    }
}
