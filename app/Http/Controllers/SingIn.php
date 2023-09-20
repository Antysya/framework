<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SingIn extends Controller
{
    public function form()
    {
      return view('sing_in');
    }

    public function post(Request $request)
    {
      $user = User::where('email', )
    }
}
