@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Tambah User</h5>
          {!! Form::open(array('route' => 'user.store','method'=>'POST', 'enctype' => 'multipart/form-data' )) !!}
        <div class="form-group">
              {!! Form::label('Nama', 'Nama', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('nama', '', ['class' => 'form-control' . ( $errors->has('nama') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Nama', old('nama'), 'autofocus', 'required']) !!}
                   @error('nama')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('Username', 'Username', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::text('username', '', ['class' => 'form-control' . ( $errors->has('username') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Username', old('usernmae'), 'autofocus', 'required']) !!}
                   @error('username')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('Email', 'Email', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::email('email', '', ['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Email', old('email'), 'autofocus', 'required']) !!}
                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          <div class="form-group">
              {!! Form::label('Password', 'Password', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::password('password', ['class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' ),
                   'placeholder' => 'Masuakan Password', 'required']) !!}
                   @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
           <div class="form-group">
              {!! Form::label('Level', 'Level', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-12">
                  {!! Form::select('level',['admin' => 'admin', 'operator' => 'operator'], '', 
                  
                  ['class' => 'form-control' ,
                   'placeholder' => 'Masuakan Level', 'required']) !!}
                   @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
              </div>
          </div>
          
          
          <div class="form-group">
            {!! Form::label('Foto', 'Foto', ['class' => 'control-label col-md-3']) !!}
            <div class="col-md-12">
              {!!Form::file("foto",[ "class" => "form-group", 'required' ])!!}
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
