@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$questionnaire->title}}</div>

                <div class="card-body">
                    <form action="/surveys/{{$questionnaire->id}}" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Your Fullname" value = "{{ old('name') }}">
                            <small id="nameHelp" class="form-text text-muted">Kindly enter your full name in this format: Surname Firstname Middlename</small>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email" value = "{{ old('email') }}">
                            <small id="emailHelp" class="form-text text-muted">Kindly enter your active email address</small>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <input type="hidden" name="questionnaire_id" value="{{$questionnaire->id}}">
                        </div>
                        @foreach($questionnaire->questions as $key => $question)
                        <div>
                            <div class="card-header"><span class="mr-2">{{$key+1}}</span>{{$question->question}}</div>
                            <div class="card-body">
                               @error('responses.'.$question->id.'.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                               @enderror
                               @foreach($question->answers as $key1 => $answer)
                                    <div class="row">
                                        <input name='responses[{{$question->id}}][question_id]' value='{{$question->id}}' type="hidden">
                                         <label for="response-{{$question->id}}-{{$answer->id}}" class="col-sm-11"> 
                                         <input type="radio" name="responses[{{$question->id}}][answer_id]" id="response-{{$question->id}}-{{$answer->id}}"
                                                value="{{$answer->id}}" class="col-sm-1" {{(old('responses.'.$question->id.'.answer_id') == $answer->id) ? 'checked' : ''}}>
                                         <strong class="mr-1">{{strtoupper($alphabet[$key1])}})</strong>
                                             {{$answer->answer}}</label>
                                       
                                    </div>
                               @endforeach
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



