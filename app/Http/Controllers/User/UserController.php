<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

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
        $roles = Role::all();
        return view("admin.user.tambah_user", compact('roles'));
    }

    public function userStore(Request $request)
    {
        $validateData = $request->validate([
            'textNama' => 'required',
            'email' => 'required|unique:users',
        ]);

        $data = new User();
        $data->nama = $request->textNama;
        $data->role = $request->textRole;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('user.view')->with('message', 'berhasil tambah user');
    }

    public function userEdit($id)
    {
        $roles = Role::all();
        $editData = User::find($id);
        return view("admin.user.edit_user", compact('editData', 'roles'));
    }

    public function userUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textNama' => 'required',
            'email' => 'required',
        ]);

        $data = User::find($id);
        $data->nama = $request->textNama;
        $data->role = $request->textRole;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('user.view')->with('message', 'berhasil tambah user');
    }


    public function userHapus($id)
    {
        $hapusDataUser = User::find($id);
        $hapusDataUser->delete();

        return redirect()->route('user.view')->with('message', 'berhasil tambah user');
    }
}