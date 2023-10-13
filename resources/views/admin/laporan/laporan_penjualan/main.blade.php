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
                <form action="{{route('laporanPenjualan')}}" method="GET">
                  <div class="row mb-2">
                    <div class="col">
                      Range Tanggal
                    </div>
                    <div class="col-4">
                        <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" 
                            value="{{isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : date('Y-m-d')}}">
                    </div>
                    <div class="col-0">
                      -
                    </div>
                    <div class="col-4">
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" 
                            value="{{ isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : date('Y-m-d') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                          Cari</button>
                        <a class="btn btn-warning" onclick="print()"><i class="fa fa-print"></i>
                          Print</a>
                    </div>
                  </div>
                </form>      
                <table id="tabel-data" class="table table-bordered table-striped table-responsive">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Transaksi</th>
                          <th>Kode Invoice</th>
                          <th>Nama Pembeli</th>
                          <th>Produk</th>
                          <th>QTY</th>
                          <th>Tanggal Transaksi</th>
                          <th>Status Transaksi</th>
                          <th>Alamat Tujuan</th>
                          <th>Ekspedisi</th>
                          <th>Catatan Pembeli</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($laporan_penjualan as $key => $lp)
                      <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$lp->kode_transaksi}}</td>
                          <td>{{$lp->kode_invoice}}</td>
                          <td>{{$lp->users->nama_lengkap}}</td>
                          <td>
                              <ol>
                                  @foreach ($lp->transaksi_detail as $td)
                                  <li>{{$td->produk->nama_produk}}</li>
                                  @endforeach
                              </ol>
                          </td>
                          <td>
                            <ul>
                              @foreach ($lp->transaksi_detail as $td)
                              <li>{{$td->qty}}</li>
                              @endforeach
                            </ul>
                          </td>
                          <td>{{$lp->tanggal_transaksi}}</td>
                          <td>{{$lp->status_transaksi}}</td>
                          <td>
                            PROVINSI {{($lp->provinsi->nama_provinsi) ? $lp->provinsi->nama_provinsi : 
                            '-'}}, {{($lp->kabupaten->nama_kabupaten) ?
                              $lp->kabupaten->nama_kabupaten : '-'}}, KODE POS {{($lp->kode_pos) ?
                              $lp->kode_pos : '-'}}, {{($lp->alamat_lengkap) ? $lp->alamat_lengkap :
                              '-'}}
                          </td>
                          <td>{{$lp->ekspedisi}}</td>
                          <td>{{$lp->catatan_pembeli}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Kode Invoice</th>
                                <th>Nama Pembeli</th>
                                <th>Produk</th>
                                <th>QTY</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status Transaksi</th>
                                <th>Alamat Tujuan</th>
                                <th>Ekspedisi</th>
                                <th>Catatan Pembeli</th>
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

    function print() {
      var tanggal_awal = $("#tanggal_awal").val()
      var tanggal_akhir = $("#tanggal_akhir").val()

      window.open(`{{route('laporanPenjualanPrint')}}?tanggal_awal=${tanggal_awal}&tanggal_akhir=${tanggal_akhir}`, '_blank')
    }
</script>
@endsection