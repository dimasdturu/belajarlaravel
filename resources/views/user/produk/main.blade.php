@extends('user.layout.app')

@section('content')
    
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                            <figure class="product-main-image">
                                <img id="product-zoom" src="{{asset('template-admin/img/produk/'.$produk->foto_produk)}}" 
                                data-zoom-image="{{asset('template-admin/img/produk/'.$produk->foto_produk)}}" alt="product image">
                            </figure><!-- End .product-main-image -->

                            <div id="product-zoom-gallery" class="product-image-gallery">
                                <a
                                data-image="{{asset('template-admin/img/produk/'.$produk->foto_produk)}}"
                                data-zoom-image="{{asset('template-admin/img/produk/'.$produk->foto_produk)}}">
                                    <img src="{{asset('template-admin/img/produk/'.$produk->foto_produk)}}" alt="product side">
                                </a>
                            </div><!-- End .product-image-gallery -->
                        </div><!-- End .row -->
                    </div><!-- End .product-gallery -->
                </div><!-- End .col-md-6 -->

                <div class="col-md-6">
                    <div class="product-details">
                        <h1 class="product-title">{{$produk->nama_produk}}</h1><!-- End .product-title -->

                        <div class="ratings-container">
                            <a class="ratings-text" href="#product-review-link" id="review-link">Stok : {{$produk->stok_produk}}</a>
                        </div><!-- End .rating-container -->

                        <div class="product-price">
                            Rp. {{number_format($produk->harga_produk, 0, ',', '.')}}
                        </div><!-- End .product-price -->

                        <form action="{{route('userAddToCart')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$produk->id_produk}}">
                            <button type="submit" class="btn btn-primary mb-1">Tambah Ke Keranjang</button>
                        </form>
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->

        <div class="product-details-tab">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" 
                    role="tab" aria-controls="product-desc-tab" aria-selected="true">Deskripsi</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <h3>Informasi Produk</h3>
                        <p>{{$produk->deskripsi_produk}}</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-details-tab -->

    </div><!-- End .container -->
</div><!-- End .page-content -->

@endsection