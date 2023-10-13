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
                <h3 class="card-title">Form Ubah Data {{$judul}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('produkUpdate', $produk->id_produk)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" 
                        value="{{(old('nama_produk')) ? old('nama_produk') : $produk->nama_produk}}"
                        class="form-control" id="nama_produk" placeholder="Masukkan Nama Produk" required>
                  </div>

                  <div class="form-group">
                    <label for="id_kategori_produk">Kategori Produk</label>
                    <select name="id_kategori_produk" id="id_kategori_produk" class="form-control" required>
                        <option value="">.:: Pilih Kategori Produk ::.</option>
                        @foreach ($kategori_produk as $kp)
                            <option value="{{$kp->id_kategori_produk}}" {{($kp->id_kategori_produk ==
                            $produk->kategori_produk_id) ? 'selected' : ''}}>{{$kp->nama_kategori_produk}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="stok_produk">Stok Produk</label>
                    <input type="number" name="stok_produk" 
                        value="{{(old('stok_produk')) ? old('stok_produk') : $produk->stok_produk}}"
                        class="form-control" id="stok_produk" placeholder="Masukkan Stok Produk" required>
                  </div>

                  <div class="form-group">
                    <label for="berat_produk">Berat Produk (gram)</label>
                    <input type="number" name="berat_produk" 
                        value="{{(old('berat_produk')) ? old('stok_produk') : $produk->berat_produk}}"
                        class="form-control" id="berat_produk" placeholder="Masukkan Berat Produk" required>
                  </div>

                  <div class="form-group">
                    <label for="harga_produk">Harga Produk</label>
                    <input type="number" name="harga_produk" 
                        value="{{(old('harga_produk')) ? old('harga_produk') : $produk->harga_produk}}"
                        class="form-control" id="harga_produk" placeholder="Masukkan Harga Produk" required>
                  </div>

                  <div class="form-group">
                    <label for="deskripsi_produk">Deskripsi Produk</label>
                    <textarea name="deskripsi_produk" class="form-control" id="deskripsi_produk" cols="30"
                        rows="5" placeholder="Masukkan Deskripsi Produk" required>{{(old('deskripsi_produk')) 
                        ? old('deskripsi_produk') : $produk->deskripsi_produk }}</textarea>
                  </div>                

                  <div class="form-group">
                    <label for="foto_produk">Foto Produk (kosongi Foto Produk jika tidak ada perubahan)</label>
                    <input type="file" name="foto_produk" class="form-control" id="foto_produk">
                  </div>

                  <div class="form-group">
                    </div class="card">
                      <div class="card-body">
                          <img src="{{asset('template-admin/img/produk')}}/{{$produk->foto_produk}}" width="200" alt="">
                      </div>
                    </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('produk')}}" class="btn btn-warning">Kembali</a>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
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

@endsection

@section('script')

@endsection