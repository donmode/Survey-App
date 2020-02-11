@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$questionnaire->title}}
                    <div class="text-right pr-3">
                        <a href="/questionnaires/{{$questionnaire->id}}/questions/create" class="btn btn-sm btn-dark">Add Question</a>
                        <a href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" class="btn btn-sm btn-dark">Take Survey</a>
                    </div>
                </div>                
                <div class="card-body">
                    <div class="card mt-3">
                        @foreach($questionnaire->questions as $question)
                        
                        <div style="display:inline;">
                            <div class="card-header">
                                {{$question->question}}
                            <span style="float:right;">
                                <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </span>
                            </div>
                        </div>
                           <div class="card-body">
                               @foreach($question->answers as $key => $answer)
                               <div class="d-flex justify-content-between">
                                    <div class="row">
                                            <span class="col-sm-1">{{$key+1}}</span>
                                            <span class="col-sm-10"> {{$answer->answer}}</span>
                                    </div>
                                    <div>
                                        {{($answer->responses->count())?intval(($answer->responses->count() * 100)/$question->responses->count()):0}}%
                                    </div>
                               </div>
                               @endforeach
                           </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



