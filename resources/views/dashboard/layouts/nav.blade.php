<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow">
    <div class="position-sticky">
        <div class="container-fluid mb-5 mt-3">
            <a class="navbar-brand" href="/dashboard">
                <img src="{{ asset('assets/img/Logo.png') }}" alt="logo bibu" width="28" height="28"
                    class="d-inline-block align-text-top">
                <span style="color: #007C84; margin: auto;">BiBU</span>
            </a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active shadow' : '' }}" href="/dashboard">
                    <span class="iconify" data-icon="bx:home-circle"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active shadow' : '' }}"
                    href="/dashboard/produk">
                    <span class="iconify" data-icon="carbon:product"></span>
                    Produk
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/pesanan*') ? 'active shadow' : '' }}"
                    href="/dashboard/pesanan">
                    <span class="iconify" data-icon="codicon:briefcase"></span>
                    Pesanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/riwayat/pesanan*') ? 'active shadow' : '' }}"
                    href="/dashboard/riwayat/pesanan">
                    <span class="iconify" data-icon="ic:outline-work-history"></span>
                    Riwayat Pesanan
                </a>
            </li>
        </ul>
        <hr>
    </div>
</nav>
