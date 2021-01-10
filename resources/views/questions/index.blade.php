@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Questions
                    <div class="d-flex justify-content-center">
                        <div class="ml-auto">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-info">Ask Question</a>
                        </div>
                    </div>

                </div>
                @include('layouts._message')
                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong> {{ $question->votes}}</strong>{{ Str::plural('votes',$question->votes) }}</strong>

                            </div>
                            <div class="status {{ $question->status }}">
                                <strong> {{ $question->answers." ".Str::plural('answer', $question->answers)}}</strong>

                            </div>
                            <div class="view">
                                <strong> {{ $question->views }}</strong> {{ Str::plural('view',$question->views)}}</strong>

                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center"> <a href="{{$question->url }}">
                                    <h3 class="mt-0">{{ $question->title }}</h3>
                                    <div class="ml-auto">
                                        <a href="{{ route('questions.edit', $question->id)}}"><button class="btn btn-warning">Edit</button></a>
                                    </div>
                                    <form id="delete-form-{{ $question->id }}" method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" onclick="if(confirm('Are u sure to delete it?')){
                                    event.preventDefault()
                                    document.getElementById('delete-form-{{ $question->id}}').submit()
                                    }else{
                                        event.preventDefault()  }
                                ">Delete</button>
                                    </form>
                            </div>

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