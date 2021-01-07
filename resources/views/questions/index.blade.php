@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                   @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                                <a href="{{$question->url }}">
                                    <h3 class="mt-0">{{ $question->title }}</h3>
                                    <div class="lead">
                                        <a href="{{ $question->user->url }}">
                                        <span class="badge badge-danger">
                                            {{$question->user->name}}
                                        </span>
                                    </a>
                                    <small>{{$question->created_date}}</small>
                                    </div>
                                </a>
                                {{ Str::limit($question->body, 250) }}
                            </div>                        
                        </div>
                        <hr>
                   @endforeach

                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection