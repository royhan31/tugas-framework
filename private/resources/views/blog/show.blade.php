@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mb-3" style="width: 68rem;">
  <img class="card-img-top" src="{{asset('public/images/'.$blog->foto)}}" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{$blog->judul}}</h2>
    <p class="card-text"> <h5> {{$blog->isi_berita}} </h5></p>
    <p class="card-text mb-4"><small class="text-muted">{{$blog->created_at->diffForHumans()}}</small></p>
    <div class="text-right">
      <button type="button" onclick="window.location='{{route("blog")}}'" class="btn btn-secondary">Kembali</button>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
@endsection
