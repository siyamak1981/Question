<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount) }}</h2>
                </div>
                <hr>
                @include ('layouts._messages')

                @foreach ($answers as $answer)
                <div class="media">
                    <div class="d-fex flex-column vote-controls">
                        <a title="This answer is useful" class="vote-up">
                            <i class="fas fa-caret-up fa-3x"></i>
                        </a>
                        <span class="votes-count">1230</span>
                        <a title="This answer is not useful" class="vote-down off">
                            <i class="fas fa-caret-down fa-3x"></i>
                        </a>
                       
                        <a title="Mark this answer as best answer" class="{{ $answer->status }} mt-2"
                    
                        onclick="if(confirm('Are u sure to like it as best answer?')){
                            event.preventDefault();
                            document.getElementById('accept-answer-{{ $answer->id }}').submit();
                        }"
                        >
                            <i class="fas fa-check fa-2x"></i>
                        </a>
                        <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display:none">
                        @csrf
                        </form>
                    </div>
                    <div class="media-body">
                        {!! $answer->body_html !!}
                        <div class="row">
                            @can('update', $answer)
                            <a href="{{ route('questions.answers.edit', [$question->id,$answer->id]) }}" class="btn btn-danger">Edit</a>
                            @endcan
                            @can('delete', $answer)
                            <form action="{{route('questions.answers.destroy', [$question->id,$answer->id]) }}" method="POST" id="delete-answer-{{ $answer->id}}" >
                            @csrf
                            @method('DELETE')
                                <a href="" onclick="if(confirm('are u sure to delete it')){
                             event.preventDefault()
                             document.getElementById('delete-answer-{{ $answer->id }}').submit();
                         }" class="btn btn-warning">Delete</a>
                            </form>
                            @endcan
                        </div>
                        <div class="float-right">
                            <span class="text-muted">Answered {{ $answer->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url }}" class="pr-2">
                                    <img src="{{ $answer->user->avatar }}">
                                </a>
                                <div class="media-body mt-1">
                                    <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>