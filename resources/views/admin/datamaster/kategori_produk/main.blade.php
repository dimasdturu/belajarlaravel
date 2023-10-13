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
                <a href="{{route('kategoriProdukCreate')}}" class="btn btn-primary">Tambah Data {{$judul}}</a>
              <table id="table-data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori Produk</th>
                        <th>Slug Kategori Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori_produk as $key => $kp)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$kp->nama_kategori_produk}}</td>
                        <td>{{$kp->slug_kategori_produk}}</td>
                        <td>
                            <a href="{{route('kategoriProdukShow', $kp->id_kategori_produk)}}" class="btn btn-warning btn-sm"><i
                                class="fa fa-eye"></i></a>
                            <a href="{{route('kategoriProdukEdit', $kp->id_kategori_produk)}}" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></a>
                            <a href="{{route('kategoriProdukDelete', $kp->id_kategori_produk)}}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah anda ingin menghapus Data?')"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori Produk</th>
                        <th>Slug</th>
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