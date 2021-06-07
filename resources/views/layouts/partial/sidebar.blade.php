<nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin Owner</h3>
                <strong>AO</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-inbox"></i>
                        Pesanan
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Pesanan Masuk</a>
                        </li>
                        <li>
                            <a href="#">Pesanan Diproses</a>
                        </li>
                        <li>
                            <a href="#">Pesanan Diterima</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin_pegawai.php">
                    <i class="fas fa-users"></i>
                        Pegawai
                    </a>
                <li>
                    <a href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        Keuangan
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-book"></i>
                        Laporan
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Laporan 1</a>
                        </li>
                        <li>
                            <a href="#">Laporan 2</a>
                        </li>
                        <li>
                            <a href="#">Laporan 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-image"></i>
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        FAQ
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    By Cateringku
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link">Selamat Datang, Admin</a>
                            </li>
                            <li class="nav-item active">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>