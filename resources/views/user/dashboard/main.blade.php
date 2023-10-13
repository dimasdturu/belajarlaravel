@extends('user.layout.app')

@section('content')
    
<div class="container">
  <div class="intro-slider-container slider-container-ratio mb-2">
      <div class="intro-slider owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{"nav": false}'>
          <div class="intro-slide">
              <figure class="slide-image">
                  <picture>
                      <source media="(max-width: 480px)" srcset="assets/images/demos/demo-10/slider/slide-1-480w.jpg">
                      <img src="{{asset('template-user/assets/images/demos/demo-10/slider/slide-1.jpg')}}" alt="Image Desc">
                  </picture>
              </figure><!-- End .slide-image -->

              <div class="intro-content">
                @php
                    $judul = "Keyboard Gaming Rexus Daxa M84 Pro";
                    $slug = Str::slug($judul);
                @endphp
                  <h3 class="intro-subtitle">Promo Oktober</h3><!-- End .h3 intro-subtitle -->
                  <h1 class="intro-title text-white">Keyboard Mechanical REXUS</h1><!-- End .intro-title -->

                  <div class="intro-price text-white">only Rp. 1.109.000</div><!-- End .intro-price -->

                  <a href="{{route('userProduk', $slug)}}" class="btn btn-white-primary btn-round">
                      <span>SHOP NOW</span>
                      <i class="icon-long-arrow-right"></i>
                  </a>
              </div><!-- End .intro-content -->
          </div><!-- End .intro-slide -->

          <div class="intro-slide">
              <figure class="slide-image">
                  <picture>
                      <source media="(max-width: 480px)" srcset="assets/images/demos/demo-10/slider/slide-2-480w.jpg">
                      <img src="{{asset('template-user/assets/images/demos/demo-10/slider/slide-2.jpg')}}" alt="Image Desc">
                  </picture>
              </figure><!-- End .slide-image -->

              <div class="intro-content">
                @php
                    $judul = "Gaming Chair REXUS RGC 201 Max";
                    $slug = Str::slug($judul);
                @endphp
                  <h3 class="intro-subtitle">Trending Now</h3><!-- End .h3 intro-subtitle -->
                  <h1 class="intro-title text-white">Gaming Chair Rexus</h1><!-- End .intro-title -->

                  <div class="intro-price text-white">only Rp. 3.490.000</div><!-- End .intro-price -->

                  <a href="{{route('userProduk', $slug)}}" class="btn btn-white-primary btn-round">
                      <span>SHOP NOW</span>
                      <i class="icon-long-arrow-right"></i>
                  </a>
              </div><!-- End .intro-content -->
          </div><!-- End .intro-slide -->

          <div class="intro-slide">
              <figure class="slide-image">
                  <picture>
                      <source media="(max-width: 480px)" srcset="assets/images/demos/demo-10/slider/slide-3-480w.jpg">
                      <img src="{{asset('template-user/assets/images/demos/demo-10/slider/slide-3.jpg')}}" alt="Image Desc">
                  </picture>
              </figure><!-- End .slide-image -->

              <div class="intro-content">
                @php
                    $judul = "Mouse Razer Basilisk V3 Pro";
                    $slug = Str::slug($judul);
                @endphp
                  <h3 class="intro-subtitle text-white">Promo Gear</h3><!-- End .h3 intro-subtitle -->
                  <h1 class="intro-title text-white">Mouse Razer Dragon Pro</h1><!-- End .intro-title -->

                  <div class="intro-price text-white">discount 60%</div><!-- End .intro-price -->

                  <a href="{{route('userProduk', $slug)}}" class="btn btn-white-primary btn-round">
                      <span>SHOP NOW</span>
                      <i class="icon-long-arrow-right"></i>
                  </a>
              </div><!-- End .intro-content -->
          </div><!-- End .intro-slide -->
      </div><!-- End .intro-slider owl-carousel owl-simple -->
      <span class="slider-loader"></span><!-- End .slider-loader -->
  </div><!-- End .intro-slider-container -->
</div><!-- End .container -->

<div class="mb-4"></div><!-- End .mb-4 -->

<div class="container">
  <div class="heading heading-center mb-3">
      <h2 class="title-lg mb-2">PENJUALAN PRODUK TERATAS</h2><!-- End .title-lg text-center -->

      <ul class="nav nav-pills justify-content-center" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab" aria-controls="top-all-tab" aria-selected="true">All</a>
          </li>
          @foreach($kategori_produk as $kp)
            <li class="nav-item">
                <a class="nav-link" id="top-{{$kp->id_kategori_produk}}-link" data-toggle="tab" href="#top-{{$kp->id_kategori_produk}}-tab" role="tab" aria-controls="top-{{$kp->id_kategori_produk}}-tab" aria-selected="false">{{$kp->nama_kategori_produk}}</a>
            </li>
          @endforeach
      </ul>
  </div><!-- End .heading -->

  <div class="tab-content">

    <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
        <div class="products just-action-icons-sm">
            <div class="row">
              @foreach($produk as $p)
                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                    <div class="product product-3 text-center">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="{{asset('template-admin/img/produk/'.$p->foto_produk)}}" alt="Product image" class="product-image">
                            </a>
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{$p->kategori_produk->nama_kategori_produk}}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title">{{$p->nama_produk}}</h3><!-- End .product-title -->
                            <div class="product-price">
                                Rp. {{number_format($p->harga_produk)}}
                            </div><!-- End .product-price -->
                        </div><!-- End .product-body -->

                        <div class="product-footer mb-1">
                            <div class="ratings-container">
                                <span class="ratings-text">Stok : {{$p->stok_produk}}</span>
                            </div><!-- End .rating-container -->

                            {{-- <div class="product-action"> --}}
                              <form action="{{route('userAddToCart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$p->id_produk}}">
                                <button type="submit" class="btn btn-primary mb-1"><span>Tambah Ke Keranjang</span></button>
                              </form>
                              <a href="{{route('userProduk', $p->slug_produk)}}" class="btn btn-success"><span>Detail Produk</span></a>
                            {{-- </div><!-- End .product-action --> --}}
                        </div><!-- End .product-footer -->
                    </div><!-- End .product -->
                </div><!-- End .col-6 col-md-4 col-lg-3 -->
              @endforeach
            </div><!-- End .row -->
        </div><!-- End .products -->
    </div><!-- .End .tab-pane -->

    @foreach($kategori_produk as $kp)
      <div class="tab-pane p-0 fade" id="top-{{$kp->id_kategori_produk}}-tab" role="tabpanel" aria-labelledby="top-all-link">
          <div class="products just-action-icons-sm">
              <div class="row">
                @foreach($kp->produk as $p)
                  <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                      <div class="product product-3 text-center">
                          <figure class="product-media">
                              <a href="product.html">
                                  <img src="{{asset('template-admin/img/produk/'.$p->foto_produk)}}" alt="Product image" class="product-image">
                              </a>
                          </figure><!-- End .product-media -->

                          <div class="product-body">
                              <div class="product-cat">
                                  <a href="#">{{$p->kategori_produk->nama_kategori_produk}}</a>
                              </div><!-- End .product-cat -->
                              <h3 class="product-title">{{$p->nama_produk}}</h3><!-- End .product-title -->
                              <div class="product-price">
                                  Rp. {{number_format($p->harga_produk)}}
                              </div><!-- End .product-price -->
                          </div><!-- End .product-body -->

                          <div class="product-footer mb-1">
                              <div class="ratings-container">
                                  <span class="ratings-text">Stok : {{$p->stok_produk}}</span>
                              </div><!-- End .rating-container -->

                              {{-- <div class="product-action"> --}}
                                <form action="{{route('userAddToCart')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$p->id_produk}}">
                                  <button type="submit" class="btn btn-primary mb-1"><span>Tambah Ke Keranjang</span></button>
                                </form>
                                <a href="{{route('userProduk', $p->slug_produk)}}" class="btn btn-success"><span>Detail Produk</span></a>
                              {{-- </div><!-- End .product-action --> --}}
                          </div><!-- End .product-footer -->
                      </div><!-- End .product -->
                  </div><!-- End .col-6 col-md-4 col-lg-3 -->
                @endforeach
              </div><!-- End .row -->
          </div><!-- End .products -->
      </div><!-- .End .tab-pane -->
      @endforeach
  </div><!-- End .tab-content -->
</div><!-- End .container -->

<div class="mb-5"></div><!-- End .mb5 -->

@endsection