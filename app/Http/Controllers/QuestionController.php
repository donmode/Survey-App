<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;

class QuestionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function create(Questionnaire $questionnaire){
        return view('question.create', compact('questionnaire'));
    }
        
    public function destroy(Questionnaire $questionnaire, Question $question){
        $question->answers()->delete();
        $question->delete();
        return redirect('/questionnaires/'.$questionnaire->id);
    }
    
    public function store(Questionnaire $questionnaire){
        $data = request()->validate([
            'question.question'=>'required|min:3',
            'answers.*.answer'=>'required'
        ]);
        
        $question = $questionnaire->questions()->create($data['question']);
        $answers = $question->answers()->createMany($data['answers']);
        return redirect('/questionnaires/'.$questionnaire->id);
    }
}
