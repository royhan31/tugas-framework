@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Edit Karyawan</h5>
          {!! Form::open(array('route' =>['karyawan.update',$karyawan],'method'=>'PUT', 'enctype' => 'multipart/form-data')) !!}
          <div class="form-group">
              {!! Form::label('nama', 'Nama', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('nama', old('nama', $karyawan->nama), ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan NIP', 'autofocus', 'required']) !!}
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
                "placeholder" => "Pilih Kategori",'required', old('category',$karyawan->jenis_kelamin) == 'Laki-Laki' ? 'selected' : ''
             ])
            }}
            </div>
          </div>

          <div class="form-group">
              {!! Form::label('tgl_lahir', 'Tanggal Lahir', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::date('tgl_lahir', old('tgl_lahir', $karyawan->tgl_lahir), ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Tanggal Lahir', 'autofocus', 'required']) !!}
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
                  {!! Form::text('tempat_lahir', old('tempat_lahir', $karyawan->tempat_lahir), ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Tanggal Lahir', 'autofocus', 'required']) !!}
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
                  {!! Form::textarea('jabatan', old('jabatan', $karyawan->jabatan), ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Jabatan', 'autofocus', 'required']) !!}
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
                      {!! Form::file('gambar', old($karyawan->gambar),  ['id'=>'inputgambar', 'class' => 'form-control']) !!}
                  <img src="{{asset('public/images/'.$karyawan->gambar)}}" width="80" id="showgambar">
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
@section('js')
<script type="text/javascript">
    
    function readURL(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function (e){
                $('$showgambar').attr('src', e.target.result);
            }

            reader.readAsDataUrl(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });
</script>