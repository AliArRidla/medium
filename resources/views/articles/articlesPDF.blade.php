<!DOCTYPE html>
<html>
<head>
      <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
      <center>Laporan PDF</center>
      <h1 class="">{{$articles->title}}</h1>
      <img src="{{asset('storage/'.$articles -> image)}}" alt="">
      {{-- <img src="{{$articles->image}}" alt=""> --}}
      <p>{{$articles -> body}}</p>
</body>
</html>