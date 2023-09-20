<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class Questions extends Controller
{
    public function get(Request $request)
    {
      return view('questions');
    }
    /**
    * @param Request $request
    */
    public function post(Request $request)
    {
      $model = new Question();

      $model->title = $request->get('title');
      $model->text = $request->get('text');

      $model->save();

      return redirect()->route('question.get');
    }

    public function listAll(){
      $listAll =Question::all();
      return view('questions_list', ['questions'=>$listAll]);
      //dd($listAll);
    }



}
