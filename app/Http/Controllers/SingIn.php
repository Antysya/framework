<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SingIn extends Controller
{
    public function form()
    {
      return view('sing_in');
    }

    public function post(Request $request)
    {
       $user = User::where('email', $request->get('email'))
        ->get();

        $hasher = app('hash');

        if ($hasher->check(
          hash('sha256', $request->get('password')),
          $user[0]->password
        )) {
          Auth::login($user[0]);

          $username=$user[0]->name;
          session(['user-name' =>$username]);

          return redirect()->route('main');
        }

        return redirect()->route('sing_in.form')->with('error', __('auth.failed'));
    }


  /*  public function post(Request $request)
    {
      $user = User::where('email', $request->get('email'))
        //->where('password', $request->get('password'))
        ->get();
        $hasher = app('hash');

        if ($hasher->check(
          hash('sha256', $request->get('password'))
          , $user[0]->password)
        ) {

          Auth::login($user[0]);

          return redirect()->route('main');
        }

        return redirect()
        ->route('sign_in.form')
        ->with('error', __('messages.password_invalid'));
      }
      public function logout()
      {
        Auth::logout();

        return redirect()->route('main');
      }*/
}
