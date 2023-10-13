<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('template-admin/img/logoku.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">dimasdturu</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template-admin/dist/img/l.jpeg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nama_lengkap}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{$menu == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{($menu == 'datamaster') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Datamaster
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users')}}" class="nav-link {{($sub_menu == 'users') ? 'active' : ''}}">
                  <i class="far fa-user nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kategoriProduk')}}" class="nav-link {{($sub_menu == 'kategori_produk') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('produk')}}" class="nav-link {{($sub_menu == 'produk') ? 'active' : ''}}">
                  <i class="nav-icon fas fa-columns"></i>
                  <p>Data Produk</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('transaksi')}}" class="nav-link {{($menu == 'transaksi') ? 'active' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Transaksi</p>
            </a>
          </li>

          <li class="nav-item {{($menu == 'laporan') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link {{($menu == 'laporan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('laporanPenjualan')}}" class="nav-link {{($sub_menu == 'laporan_penjualan') ? 'active' : ''}}">
                  <i class="nav-icon far fa-envelope"></i>
                  <p>Laporan Penjualan</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link {{($menu == 'logout') ? 'active' : ''}}" 
                  onclick="return confirm('Apakah Anda ingin Logout?')">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
          </li>    
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>