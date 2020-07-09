<?php

namespace App\Http\Controllers;

use App\Question;

use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Auth;

class QuestionController extends Controller
{
    public function viewAll(){
       
        $question=Question::with('user')->latest()->paginate(5);

        return view('question.view',compact('question'))->render();
      
    }

    public function create(Request $request){
            if ($request->isMethod('post')){
                $validatedData = $request->validate([
                    'title' => 'required|max:255',
                    'body' => 'required',
                ]);
                    $question= new Question;
                    $question->title=$request->title;
                    $question->user_id=Auth::user()->id;
                    $question->body=$request->body;
                    $question->save();

                    return redirect()->route('ViewQuestions')->with('flash_message','Question Submitted');
            }

            return view('question.create');
    }
}
