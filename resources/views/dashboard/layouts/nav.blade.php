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
            @can('pemilik')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active shadow' : '' }}"
                        href="/dashboard/transaksi">
                        <span class="iconify" data-icon="healthicons:money-bag-outline"></span>
                        Transaksi
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profil*') ? 'active shadow' : '' }}"
                    href="/dashboard/profil">
                    <span class="iconify" data-icon="clarity:avatar-line"></span>
                    Profil
                </a>
            </li>
            @can('pemilik')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/customer*') ? 'active shadow' : '' }}"
                        href="/dashboard/customer">
                        <span class="iconify" data-icon="carbon:user-profile"></span>
                        Customer
                    </a>
                </li>
            @endcan
        </ul>

        {{-- logout --}}
        <div class="text-center">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="mt-5 md-5 rounded-circle shadow-lg p-2 border border-light hover-logout">
                    <span class="iconify logout" data-icon="ri:logout-circle-line"></span>
                </button>
            </form>
        </div>
    </div>
</nav>
