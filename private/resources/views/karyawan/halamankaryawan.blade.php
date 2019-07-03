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
    <button class="btn btn-primary" type="button" onclick="window.location='{{route("karyawan.create")}}'" name="button">Tambah</button>
  </div>
  @if($karyawans->isEmpty())
  <div class="text-center">
    <h4>Tidak ada Karyawan</h4>
  </div>
  @else
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Semua Data Karyawan</h3>
            </div><br><br>  
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                @method('PATCH')
                <thead>
                <tr >
                  <th>No</th>
                  <th style="text-align: center;">Nama</th>
                  <th style="text-align: center;">Jenis Kelamin</th>
                  <th style="text-align: center;">Tanggal Lahir</th>
                  <th style="text-align: center;">Tampat Lahir</th>
                  <th style="text-align: center;">Jabatan</th>
                  <th style="text-align: center;">Gambar</th>
                  <th style="text-align: center;" >Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 0;?>
                  @foreach($karyawans as $data)
                  <?php $no++ ;?>
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->jenis_kelamin}}</td>
                        <td>{{ Carbon\Carbon::parse($data->created_at)->formatLocalized('%A, %d %B %Y')}}</td>
                        <td>{{$data->tempat_lahir}}</td>
                        <td>{{$data->jabatan}}</td>
                        <td><img src="{{asset('public/images/'.$data->gambar)}}" width="80"></td>
                        <td><button type="button" onclick="window.location='{{route("karyawan.edit", $data)}}'" class="btn btn-warning" name="button" style="width: 65px;">Edit</button><br><br>

                          <form action="{{route('karyawan.delete', $data->id)}}" method="post">
                          @csrf
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{$data->nama}}')" type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                @endif
              </table>
            </div>
            <!-- /.box-body -->
            {{ $karyawans->links() }}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
</div>

@endsection
