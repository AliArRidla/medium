<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <title>News Application with Laravel</title>
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
 
     <!-- Styles -->
     <link href="{{ asset('css/news.css') }}" rel="stylesheet">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
 </head>
 <body>
 
 <div class="container"> <h2>Daftar Artikel</h2>
@foreach($artikel as $a)
<div class="panel panel-default" col=>
<div class="panel-heading"> <h3>{{ $a->title}}<h3>
</div>
<div class="panel-body">
<img src="{{ $a->urlToImage}}"> <p>{{ $a->description}}<p> <p>{{ $a->url}}<p>
    </div>
  </div>
@endforeach
</div>
 </body>
 </html>