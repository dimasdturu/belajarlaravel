@extends('user.layout.app')

@section('content')
    
<div class="page-header text-center" style="background-image: url('{{asset('template-user/assets/images/page-header-bg.jpg')}}')">
    <div class="container">
        <h1 class="page-title">Riwayat<span>Checkout</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Checkout</li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Checkout</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <table class="table table-wishlist table-mobile">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Total Harga</th>
                    <th>Status Checkout</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if(count($transaksi) > 0)
                    @foreach($transaksi as $t)
                        <tr>
                            <td class="product-col">
                                <div class="product">
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{asset('template-admin/img/produk/'.$t->transaksi_detail[0]->produk->foto_produk)}}" alt="Product image">
                                        </a>
                                    </figure>

                                    <h3 class="product-title">
                                        <a href="#">{{$t->transaksi_detail[0]->produk->nama_produk}}</a>
                                    </h3><!-- End .product-title -->
                                </div><!-- End .product -->
                            </td>
                            <td class="price-col">Rp. {{$t->transaksi_detail[0]->produk->harga_produk*$t->transaksi_detail[0]->qty}}</td>
                            <td class="stock-col"><span class="in-stock">{{$t->status_transaksi}}</span></td>
                            <td class="action-col">
                                @if($t->status_transaksi == 'Pengiriman')
                                    <form action="{{route('userCheckoutComplete')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$t->id_transaksi}}">
                                        <button class="btn btn-block btn-outline-success">
                                            <i class="icon-check"></i>Ubah Menjadi Selesai
                                        </button>
                                    </form>
                                @else
                                    Tidak Ada Aksi
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">Tidak Ada Data</td>
                        </tr>
                    @endif
            </tbody>
        </table><!-- End .table table-wishlist -->
    </div><!-- End .container -->
</div><!-- End .page-content -->

@endsection