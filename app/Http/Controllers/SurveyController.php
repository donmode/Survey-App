<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;

class SurveyController extends Controller
{
    private $alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t', 'u', 'v', 'w', 'x', 'y', 'z'];
    public function show(Questionnaire $questionnaire){
        $questionnaire->load('questions.answers');
        $alphabet = $this->alphabet;
        return view('survey.show', compact(['questionnaire', 'alphabet']));
    }
    public function store(Questionnaire $questionnaire){
        $data = request()->validate([
            'responses.*.answer_id'=>'required',
            'responses.*.question_id'=>'required',
            'name'=>'required|min:5',
            'email'=>'required|email',
            'questionnaire_id'=>'required'
        ]);
        $survey = $questionnaire->surveys()->create(['email'=>$data['email'], 'name'=>$data['name'], 'questionnaire_id'=>$data['questionnaire_id']]);
        $responses = $survey->responses()->createMany($data['responses']);
        return view('survey.thanks');
    }
}
