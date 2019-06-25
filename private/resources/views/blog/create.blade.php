@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah Blog</h5>
          {!! Form::open(array('route' => 'blog.store','method'=>'POST')) !!}
          <div class="form-group">
              {!! Form::label('judul', 'Judul', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('judul', '', ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Judul', old('judul'), 'autofocus', 'required']) !!}
                   @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              {{Form::select('kategori',['Teknologi' => 'Tekonologi',
               'Hiburan' => 'Hiburan',
               'Pendidikan' => 'Pendidikan'
               ], null,
             [
                "class" => "form-control",
                "placeholder" => "Pilih Kategori",'required', old('category') == 'Teknologi' ? 'selected' : ''
             ])
            }}
            </div>
          </div>
          <div class="form-group">
              {!! Form::label('deskripsi', 'deskripsi', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::textarea('deskripsi', '', ['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Judul']) !!}
                   @error('description')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              <div class="col-md-3">
                  {{ Form::submit('Simpan',['class' => 'btn btn-primary'])}}
              </div>
          </div>

          {{ Form::close()}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
