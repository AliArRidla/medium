@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="login" method="POST" action="/update/{{$article -> id}}" enctype="multipart/form-data">

            @csrf
            @method('PUT')
           
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$article -> title}}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" class="form-control" id="author" value="{{$article -> author}}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" class="form-control" name="body" id="body" rows="6">{{$article -> body}}</textarea>
            </div>

            {{-- <div class="form-group">
                <label for="file">Feature Image</label><br>
                 <img width="150px" src="{{asset('storage/'.$article -> image)}}" class="img-fluid">
                <input type="file" class="form-control" name="file" id="file" >
            </div> --}}

            <div class="form-group">
                <label for="image">Feature Image</label>
                <input type="file" class="form-control" required="required" name="image" value="{{$article->featured_image}}"></br>
                <img width="150px" src="{{asset('storage/'.$article -> image)}}">
            </div>


            <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
        </form>
        <script>
        var body = document.getElementById("body");
            CKEDITOR.replace(body,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script>
    </div>
     
@endsection