@csrf

<div class="form-group">
    <lable for="title-question">Title</lable>
    <input type="text" name='title' value="{{old('title' ,$question->title)}}" class="form-control @error('title') ? is-invalid @enderror">

</div>
<div class="form-group">
    <lable for="body-question">Message :</lable>
    <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('body') ? is-invalid @enderror">{{old('body', $question->body)}}</textarea>
</div>
<div class="form-group">
    <button class="btn btn-success btn-block">{{ $buttonText }}</button>
</div>