<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function viewAll(){
        \DB::enableQueryLog();
        $question=Question::with('user')->latest()->paginate(5);

        return view('question.view',compact('question'))->render();
        dd(\DB::getQueryLog());
    }
}
