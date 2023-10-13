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
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah {{$judul}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('kategoriProdukStore')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_kategori_produk">Nama Kategori Produk</label>
                    <input type="text" name="nama_kategori_produk" value="{{old('nama_kategori_produk')}}" class="form-control" id="nama_kategori_produk" 
                        placeholder="Masukkan Nama Kategori Produk" required>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{route('kategoriProduk')}}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')

@endsection