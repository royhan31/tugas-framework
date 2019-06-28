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
    <button class="btn btn-primary" type="button" onclick="window.location='{{route("user.create")}}'" name="button">Tambah</button>
  </div>
    <div class="row">
    <div class="col">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  @php($no = 1)
  @foreach($users as $user)
    <tr>
      <th>{{$no}}</th>
      <td>{{$user->nama}}</td>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->level}}</td>
      <td>
      <a class="mr-2" href="{{route('user.show', $user)}}"> <i class="fa fa-eye"></i> </a>
      <a class="mr-2" href="{{route('user.edit', $user)}}"> <i class="fa fa-pencil"></i> </a>
      <a href="#" data-toggle="modal" data-target="#hapus{{$user->id}}"> <i class="fa fa-trash"></i> </a>
      </td>
    </tr>
    @php($no++)
    <!-- Modal -->
    @endforeach
  </tbody>
</table>
    </div>
    </div>
</div>
@foreach($users as $user)
<div class="modal fade" id="hapus{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        {!! Form::open(array('route' =>['user.delete',$user],'method'=>'DELETE')) !!}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus user <strong>{{$user->name}}</strong> </p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button> -->
        {{ Form::submit('Batal',['class' => 'btn btn-secondary','data-dismiss' => 'modal'])}}
        {{ Form::submit('Hapus',['class' => 'btn btn-danger'])}}
      </div>
      {{ Form::close()}}
    </div>
  </div>
</div>
@endforeach
@endsection