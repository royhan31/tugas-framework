@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Blog</h5>
          {!! Form::open(array('route' =>['blog.update',$blog],'method'=>'PUT', 'enctype' => 'multipart/form-data')) !!}
          <div class="form-group">
              {!! Form::label('judul', 'Judul', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('judul', old('judul', $blog->judul), ['class' => 'form-control' . ( $errors->has('judul') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Judul', 'autofocus', 'required']) !!}
                   @error('judul')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('Isi Berita', 'Isi Berita', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::textarea('isi_berita',old('isi_berita', $blog->isi_berita),
                  ['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Isi Berita']) !!}
                   @error('description')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>

          <div class="form-group">
            {!! Form::label('Foto Sebelumnya', 'Foto Sebelumnya', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-4 mb-4">
                <img src="{{asset('public/images/'.$blog->foto)}}" width="100%" height="100%" alt="">
            </div>
            {!! Form::label('Foto', 'Foto', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-12">
              {!!Form::file("foto",[ "class" => "form-group"])!!}
            </div>
          </div>
          <div class="form-group">
              <div class="col-md-3">
                  {{ Form::submit('Simpan',['class' => 'btn btn-primary'])}}
                  <button type="button" onclick="window.location='{{route("blog")}}'" class="btn btn-secondary">Kembali</button>
              </div>
          </div>

          {{ Form::close()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
