<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SingUp extends Controller
{
    public function form()
    {
      return view('sing_up');
    }

    public function post(Request $request)
    {
        $user = new User();

        $user->name = $request->get('name');
        $user->password = hash('sha256', $request->get('password'));
        $user->email = $request->get('email');

        $user->save();

        return redirect()->route('registration.form');
    }
}
