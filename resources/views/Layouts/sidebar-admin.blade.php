<div class="navbar nav_title" style="border: 0;">
    <a href=# class="site_title"><i class="fa fa-paw"></i> <span>Erick-laundry</span></a>
</div>

<div class="clearfix"></div>

<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('assets') }}/build/images/user.png" alt="" class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{Auth::user()->name }}</h2>
    </div>
    <div class="clearfix"></div>
</div>
<!-- /menu profile quick info -->

<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="/a/dashboard">Dashboard</a></li>
                </ul>
            </li>
            <li><a href="/a/outlet"><i class="fa fa-shopping-cart"></i> Outlet </a>
            </li>
            <li><a href="/a/member"><i class="fa fa-users"></i> Member </a>
            </li>
            <li><a href="/a/paket"><i class="fa fa-archive"></i> Paket </a>

            <li><a href="/a/PenggunaanBarang"><i class="fa fa-sort-numeric-asc"></i>  Data Barang </a>
            </li>
            <li><a href="/a/user"><i class="fa fa-user"></i> User </a>
            </li>

            {{-- <li><a href="/a/data_buku"><i class="fa fa-sort-numeric-asc"></i> Simulasi </a>
            </li>
            <li><a href="/a/simulasigaji"><i class="fa fa-sort-numeric-asc"></i> Simulasi Gaji </a>
            </li>
            <li><a href="/a/simulasibarang"><i class="fa fa-sort-numeric-asc"></i> Simulasi Barang </a>
            </li>
            <li><a href="/a/penjemputan"><i class="fa fa-sort-numeric-asc"></i> Penjemputan </a>
            </li> --}}
        </ul>
        <div class="menu_section">
            <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i>Simulasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="/a/data_buku">Simulasi</a></li>
                        <li><a href="/a/simulasigaji">Simulasi Gaji</a></li>
                        <li><a href="/a/simulasibarang">Simulasi Barang</a></li>
                        <li><a href="/a/penjemputan">Penjemputan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="menu_section">
        <h3>Data Transaksi</h3>
        <ul class="nav side-menu">
            <li><a href="/a/transaksi"><i class="fa fa-usd"></i> Transaksi</a>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
