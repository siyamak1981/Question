@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">Edit Questions
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
                    <form action="{{route('questions.update', $question->id)}}" method="POST">
                    @method('PUT')
                    @include('questions._form',['buttonText' => 'Update question'])
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection