@extends('layouts.app')

@section('content')
<div class="container">
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{Session::get('success')}}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
  <div class="text-right mb-4">
    <button class="btn btn-primary" type="button" onclick="window.location='{{route("blog.create")}}'" name="button">Tambah</button>
  </div>
  @if($blogs->isEmpty())
  <div class="text-center">
    <h4>Tidak ada Blog</h4>
  </div>
  @else
  <div class="row">
    @foreach($blogs as $blog)
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('blog.show', $blog)}}">{{$blog->judul}}</a></h5>
          <h6 class="card-subtitle mb-2 text-muted">{{$blog->kategori}}</h6>
          <p>{{str_limit($blog->deskripsi, 20)}}</p>
        </div>
        <div class="card-footer text-right">
          <button type="button" onclick="window.location='{{route("blog.edit", $blog)}}'" class="btn btn-warning" name="button">Edit</button>
          <button type="button" data-toggle="modal" data-target="#hapus{{$blog->id}}" class="btn btn-danger" name="button">Hapus</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Hapus -->
  <div class="modal fade" id="hapus{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        {!! Form::open(array('route' =>['blog.delete',$blog],'method'=>'DELETE')) !!}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus blog <strong>{{$blog->judul}}</strong> </p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button> -->
        {{ Form::submit('Simpan',['class' => 'btn btn-secondary','data-dismiss' => 'modal'])}}
        {{ Form::submit('Hapus',['class' => 'btn btn-danger'])}}
      </div>
      {{ Form::close()}}
    </div>
  </div>
</div>
  @endforeach
  @endif
</div>

@endsection
