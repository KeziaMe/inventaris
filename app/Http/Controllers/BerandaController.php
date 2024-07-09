<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BerandaController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        return redirect()->Route('login');
    }
}
