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
                    'title' => 'required|max:255|unique:questions',
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

    public function edit(Request $request,$id){
        $question= Question::findorFail($id);
        
        if ($request->isMethod('post')){
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
            ]);
                
                $question->title=$request->title;
                $question->user_id=Auth::user()->id;
                $question->body=$request->body;
                $question->save();

                return redirect()->route('ViewQuestions')->with('flash_message','Question Updated');
        }

        return view('question.edit',compact('question'));
}

public function delete($id){
    $question= Question::findorFail($id);
    $question->delete();
    return "success";
}

public function index(Question $question){
   
    $question->increment('views');
    $question->save();
    return view('question.index',compact('question'));

}
}
