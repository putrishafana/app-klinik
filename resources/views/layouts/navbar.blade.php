<nav class="navbar navbar-main navbar-expand-sm px-0 mx-3 shadow-none border-radius-sm" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav ms-auto d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-body font-weight-bold d-flex align-items-center gap-2"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="material-symbols-rounded">account_circle</i>
                        <span>{{ Auth::user()->Pegawai->nama }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item text-sm fw-bold text-dark">{{ Auth::user()->Pegawai->nama }}</li>
                        <li class="dropdown-item text-sm text-secondary">{{ Auth::user()->email }}</li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button href="/logout" class="dropdown-item text-danger w-100 text-start">
                                    {{ __('Log Out') }}
                                </button>
                            </form>


                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
