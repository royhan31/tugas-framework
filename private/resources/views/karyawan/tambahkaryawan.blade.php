@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
              {!! csrf_field() !!}
        <div class="card-body">
          <h5 class="card-title">Tambah Blog</h5>
          {!! Form::open(array('route' => 'karyawan.store','method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
          <div class="form-group">
              {!! Form::label('nama', 'Nama', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('nama', '', ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Nama', old('nama'), 'autofocus', 'required']) !!}
                   @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>

          <div class="form-group">
            {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-12">
              {{Form::select('jenis_kelamin',['Laki-Laki' => 'Laki-Laki',
               'Perempuan' => 'Perempuan'
               
               ], null,
             [
                "class" => "form-control",
                "placeholder" => "Pilih Kategori",'required', old('category') == 'Laki-Laki' ? 'selected' : ''
             ])
            }}
            </div>
          </div>
          <div class="form-group">
              {!! Form::label('tgl_lahir', 'Tanggal Lahir', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::date('tgl_lahir', '', ['class' => 'form-control datepicker' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Tanggal Lahir', old('tgl_lahir'), 'autofocus', 'required']) !!}
                   @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('tempat_lahir', 'Tempat Lahir', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::textarea('tempat_lahir', '', ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Tempat Lahir', old('tempat_lahir'), 'autofocus', 'required']) !!}
                   @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('jabatan', 'Jabatan', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('jabatan', '', ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Jabatan', old('jabatan'), 'autofocus', 'required']) !!}
                   @error('title')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>

          <div class="form-group">
                            {!! Form::label('gambar','Foto' , ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-9">
                                {!! Form::file('gambar', ['class' => 'form-control']) !!}
                                @error('title')
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