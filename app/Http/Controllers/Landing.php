<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Landing extends Controller
{
    public function index(Request $request)
    {
      $name = $request->query('name', 'Ann');
      return view('landing', [
        'name' => $name
      ]);
    }

    public function json(Request $request)
    {
      $age =$request->query('age', 18);

      return response()->json(['age'=> $age]);
    }
}
