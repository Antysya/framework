<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    public function showResetForm(){
      if(Auth::check()){
        $user=Auth::user();
        $user->reset_password_code=$tr::random(64);
        $user->save();

        return view('reset_password')->with('message', 'Ссылка отправлена на почту');
      }
      else {
        return redirect('/');
      }
    }
}
