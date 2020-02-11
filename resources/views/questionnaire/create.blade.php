@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title" value = "{{ old('title') }}">
                            <small id="titleHelp" class="form-text text-muted">Captivating titles entices people to answering questionnaire</small>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input name="description" type="text" class="form-control" id="title" aria-describedby="descriptionHelp" placeholder="Enter Description" value = "{{ old('title') }}">
                            <small id="descriptionHelp" class="form-text text-muted">Help people give efficient answers by providing illustrative description</small>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Questionnaire</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


