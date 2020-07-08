<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function viewAll(){
        $question=Question::latest()->paginate(5);

        return view('question.view',compact('question'));
    }
}
