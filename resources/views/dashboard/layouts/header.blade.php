<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow">
    <div class="container py-1">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 border-0 shadow-0" href="/dashboard">
            <img src="{{ asset('assets/img/Logo.png') }}" alt="logo bibu" width="18" height="18"
                class="d-inline-block align-text-top m-auto">
            <span style="color: #007C84; margin: auto;">BiBU</span>
        </a>

        <h6 class="my-auto tx-nav-max person text-uppercase fw-bold" style="color: #007C84">
            {{ Auth()->user()->nama }}
        </h6>
        <div class="dropdown drp-header" style="border: solid 2px white; border-radius: 10px;">
            <button class="btn dropdown-toggle text-uppercase fw-bold" type="button" id="dropdownMenuButton2"
                data-bs-toggle="dropdown" aria-expanded="false" style="color: #007C84;">
                {{ Auth()->user()->nama }}
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-start dropdown-menu-end" aria-labelledby="dropdownMenuButton2"
                style="background-color: rgba(234, 243, 244, 1);">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <span class="iconify" data-icon="bx:home-circle"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}"
                        href="/dashboard/produk">
                        <span class="iconify" data-icon="carbon:product"></span>
                        Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/pesanan*') ? 'active' : '' }}"
                        href="/dashboard/pesanan">
                        <span class="iconify" data-icon="codicon:briefcase"></span>
                        Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/riwayat/pesanan*') ? 'active' : '' }}"
                        href="/dashboard/riwayat/pesanan">
                        <span class="iconify" data-icon="ic:outline-work-history"></span>
                        Riwayat Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/transaksi*') ? 'active shadow' : '' }}"
                        href="/dashboard/transaksi">
                        <span class="iconify" data-icon="healthicons:money-bag-outline"></span>
                        Transaksi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/profil*') ? 'active shadow' : '' }}"
                        href="/dashboard/profil">
                        <span class="iconify" data-icon="clarity:avatar-line"></span>
                        Profil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/customer*') ? 'active shadow' : '' }}"
                        href="/dashboard/customer">
                        <span class="iconify" data-icon="carbon:user-profile"></span>
                        Customer
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
