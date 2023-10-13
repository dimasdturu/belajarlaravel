@extends('admin.layout.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data {{$judul}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data {{$judul}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tabel {{$judul}}</h3>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
                <a href="{{route('transaksiCreate')}}" class="btn btn-primary">Tambah Data {{$judul}}</a>
              <table id="table-data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Kode Invoice</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $key => $tr)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$tr->kode_transaksi}}</td>
                        <td>{{$tr->kode_invoice}}</td>
                        <td>{{$tr->users->nama_lengkap}}</td>
                        <td>{{$tr->tanggal_transaksi}}</td>
                        <td>{{$tr->status_transaksi}}</td>
                        <td>
                            <a href="{{route('transaksiShow', $tr->id_transaksi)}}" class="btn btn-warning btn-sm"><i
                                class="fa fa-eye"></i></a>
                            {{-- <a href="{{route('transaksiEdit', $tr->id_transaksi)}}" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></a>
                            <a href="{{route('transaksiDelete', $tr->id_transaksi)}}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah anda ingin menghapus Data?')"><i
                                    class="fa fa-trash"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Kode Invoice</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('script')
    <script>
        $("#table-data").DataTable();
    </script>
@endsection