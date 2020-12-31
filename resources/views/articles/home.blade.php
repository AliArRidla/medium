@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center login">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
 <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <span>Article</span>
          <h2>Article</h2>
          <p>Silahkan baca artikel satu-satu ya</p>
        </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p class="font-weight-lighter">{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <div class="row">
            @foreach ($articles as $article)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                {{-- <img src="{{$article->image}}" alt=""> --}}
                {{-- <img src="{{ Storage::url(Session::get('file')) }}" alt=""> --}}
                <img src="{{asset('storage/'.$article -> image)}}" alt="">
                {{-- <img src="{{asset('public/'.$article -> image)}}" alt=""> --}}
                <h4>{{$article->title}}</h4>
                <span>Author : {{$article->author}}</span>
                <p>
                    {{Str::limit($article ->body, 50, '..')}}
                </p>
                <a href="/articles/{{$article->id}}" class="btn btn-secondary">Detail</a>
                <a href="/articles/{{$article->id}}/edit" class="btn btn-outline-primary">Edit</a>
                <a href="/articles/delete/{{$article->id}}" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
        <a href="/create" class="btn btn-success btn-lg btn-block">Create Article</a>
      </div>
    </section><!-- End Team Section -->
@endsection
