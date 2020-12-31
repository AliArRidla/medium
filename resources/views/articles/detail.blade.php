@extends('layouts.app')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Article Details</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Article Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            {{-- <img src="images/{{$article -> image}}" class="img-fluid" alt=""> --}}
            {{-- <img src="{{URL::to('images/'.$article->image)}}" class="img-fluid" alt=""> --}}

            {{-- <img src="{{asset('img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt=""> --}}
               <img src="{{asset('storage/'.$article -> image)}}" class="img-fluid"  alt="">
          </div>

          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Title</strong> : {{$article->title}}</li>
              <li><strong>Author</strong> : {{$article->author}}</li>
              <li><strong>Project date</strong> : {{$article->created_at}}</li>
              {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{$article -> judul}}</h2>
          <p>{{$article -> body}}</p>
        </div>
      <a href="/articles/cetak/{{$article->id}}" class="btn btn-primary" target="_blank">CETAK PDF</a>
      </div>
    </section><!-- End Portfolio Details Section -->
@endsection
