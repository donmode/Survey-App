
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="POST">
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter Question" value = "{{ old('question.question') }}">
                            <small id="questionHelp" class="form-text text-muted">Make Question short and precise</small>
                            @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <fieldset>
                            <legend>Choices</legend>
                            <small id="choicesHelp" class="form-text text-muted">Enter various Choices</small>
                            
                            <div class="form-group">
                                <label for="choice1">Choice 1</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="choice1" aria-describedby="choiceHelp" placeholder="Enter Choice" value = "{{ old('answers.0.answer') }}">
                                @error('answers.0.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="choice2">Choice 2</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="choice2" aria-describedby="choiceHelp" placeholder="Enter Choice" value = "{{ old('answers.1.answer') }}">
                                @error('answers.1.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="choice3">Choice 3</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="choice3" aria-describedby="choiceHelp" placeholder="Enter Choice" value = "{{ old('answers.2.answer') }}">
                                @error('answers.2.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="choice4">Choice 4</label>
                                <input name="answers[][answer]" type="text" class="form-control" id="choice4" aria-describedby="choiceHelp" placeholder="Enter Choice" value = "{{ old('answers.3.answer') }}">
                                @error('answers.3.answer')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                        </fieldset>
                        
                        
                        <button type="submit" class="btn btn-primary">Add Question</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


