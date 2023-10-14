<header class="header">
    <div class="header-top">
        <div class="container">
            <a href="https://www.instagram.com/dimasdturu/" target="_blank"><i class="icon-instagram"></i> @dimasdturu</a>
            <div class="header-right">
                <div class="header-dropdown">
                    <ul class="top-menu">
                        <li>
                            <ul>
                                @if(Auth::check())
                                    <li><a href="{{route('userCheckoutHistory')}}"><i class="icon-home"></i>Riwayat Checkout</a></li>
                                    <li><a href="#"><i class="icon-user"></i>{{Auth::user()->nama_lengkap}}</a></li>
                                    <li><a href="{{route('logout')}}"></i>Logout</a></li>
                                @else
                                    <li><a href="{{route('login')}}"></i>Login</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">

                <a href="{{route('userDashboard')}}" class="logo">
                    <img src="{{asset('template-user/assets/images/logoku.png')}}" alt="Logo dimasdturu" width="170" height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right">

                @if(Auth::check())
                    @php
                        $get_keranjang = DB::table('keranjang as k')
                                            ->where('user_id', Auth::id())
                                            ->join('produk as p', 'p.id_produk', 'k.produk_id')
                                            ->get();
                    @endphp
                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{count($get_keranjang)}}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            @if(count($get_keranjang) > 0)
                                @foreach($get_keranjang as $gk)
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.html">{{$gk->nama_produk}}</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">{{$gk->qty}}</span>
                                                - Total : Rp. {{number_format($gk->qty*$gk->harga_produk, 0, ',', '.')}}
                                            </span>
                                            <form action="{{route('userCheckout')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$gk->id_keranjang}}">
                                                <button type="submit" href="" class="btn btn-outline-primary-2"><span>Beli</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </form>                 
                                        </div><!-- End .product-cart-details -->

                                        <figure class="product-image-container">
                                            <a href="product.html" class="product-image">
                                                <img src="{{asset('template-admin/img/produk/'.$gk->foto_produk)}}">
                                            </a>
                                        </figure>
                                        <form action="{{route('userRemoveToCart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$gk->produk_id}}">
                                            <button type="submit" href="" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                        </form>
                                    </div><!-- End .product -->
                                @endforeach
                            @else
                                <div>Tidak Ada Produk</div>
                            @endif
                        </div><!-- End .cart-product -->
                    </div><!-- End .dropdown-menu -->
                    @endif
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->