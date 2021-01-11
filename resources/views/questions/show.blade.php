@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Show question
                    <div class="d-flex justify-content-center">
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-info">Ask Question</a>
                        </div>
                    </div>

                </div>
                @include('layouts._message')
                <div class="card-body">
     
                    <div class="media">
                        <div class="media-body">
                            <div class="d-flex align-items-center"> 
                                    <h3 class="mt-0">{{ $question->title }}</h3>
                               
                            </div>

                            <div class="lead">
                          
                            {!! $question->body_html !!}
                        </div>
                    </div>
                    <hr>
               

                </div>
            </div>
        </div>
    </div>
</div>
@endsection