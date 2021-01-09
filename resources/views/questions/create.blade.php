@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">All Questions
                    <div class="d-flex justify-content-center">
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-warning">Back To Question</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    @error('body')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    @enderror
                    <form action="{{route('questions.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <lable for="title-question">Title</lable>
                            <input type="text" name='title' value="{{old('title')}}" class="form-control @error('title') ? is-invalid @enderror">

                        </div>
                        <div class="form-group">
                            <lable for="body-question">Message :</lable>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') ? is-invalid @enderror">{{old('body')}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block">Submit</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection