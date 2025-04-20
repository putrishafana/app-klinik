<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header d-flex justify-content-center">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('img/pj-klinik.png') }}" class="navbar-brand-img" width="60" height="60"
                alt="main_logo">
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active bg-gradient-dark text-white" href="/dashboard">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="collapse" href="#masterMenu" role="button"
                        aria-expanded="false" aria-controls="masterMenu">
                        <i class="material-symbols-rounded opacity-5">folder_open</i>
                        <span class="nav-link-text ms-1">Master</span>
                    </a>
                    <div class="collapse ps-4" id="masterMenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/wilayah">
                                    <span class="nav-link-text">Wilayah</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/tindakan">
                                    <span class="nav-link-text">Tindakan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/obat">
                                    <span class="nav-link-text">Obat</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/pegawai">
                                    <span class="nav-link-text">Pegawai</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="/user">
                                    <span class="nav-link-text">User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif

            @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                <li class="nav-item">
                    <a class="nav-link text-dark" data-bs-toggle="collapse" href="#transaksiMenu" role="button"
                        aria-expanded="false" aria-controls="transaksiMenu">
                        <i class="material-symbols-rounded opacity-5">order_approve</i>
                        <span class="nav-link-text ms-1">Transaksi</span>
                    </a>
                    <div class="collapse ps-4" id="transaksiMenu">
                        <ul class="nav flex-column">
                            @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="/pendaftaran-pasien">
                                        <span class="nav-link-text">Pendaftaran Pasien</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="pemeriksaan">
                                        <span class="nav-link-text">Tindakan & Obat</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
            @endif
            </li>
            @if (Auth::user()->role == 1 || Auth::user()->role == 4)
                <li class="nav-item">
                    <a class="nav-link text-dark" href="/pembayaran">
                        <i class="material-symbols-rounded opacity-5">payments</i>
                        <span class="nav-link-text ms-1">Pembayaran</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-dark" href="/laporan">
                    <i class="material-symbols-rounded opacity-5">lab_profile</i>
                    <span class="nav-link-text ms-1">Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
