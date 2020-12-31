@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="login" method="POST" action="/store" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <select class="form-control" id="author" name="author">
                @foreach ($articles as $item)
                    <option value="{{$item->author}}">{{$item->author}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
               <label for="body">body</label>
                <input type="text" name="body" class="form-control" id="body" placeholder="Masukkan body">
            </div>
            {{-- <div class="form-group">
               <label for="image">Image</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="Masukkan image">
            </div> --}}
            <div class="form-group">
               <label for="file">Image</label>
                <input type="file" name="file" class="form-control" id="file" placeholder="Masukkan image">
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Create</button>
        </form>
    </div>
   
@endsection