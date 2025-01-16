<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="{{route('dashboard')}}" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3"
        data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('dashboard')}}">
                <img src="{{asset('backend/assets/images/logo2.png')}}" alt="Logo" style="width: 50px; height: 50px;"
                    class="navbar-brand-img brand-sm" />
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Beranda</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Menu</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
            </li>

            @if (auth()->user()->role == "SARPRAS")
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('form_pengaduan')}}">
                    <i class="fe fe-credit-card fe-16"></i>
                    <span class="ml-3 item-text">Form Pengaduan</span>
                </a>
            </li>
            @endif

            @if (
            auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS" || auth()->user()->role == "Kepala
            Sekolah"
            )
            <li class="nav-item dropdown">
                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Kelola Data</span>
                </a>

                @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('ruangan.view')}}"><span class="ml-1 item-text">
                                Ruangan</span></a>
                    </li>
                </ul>
                @endif

                @if (
                auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS" || auth()->user()->role ==
                "Kepala Sekolah"
                )
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('barang.view')}}"><span class="ml-1 item-text">
                                Barang</span></a>
                    </li>
                </ul>
                @endif

                @if (auth()->user()->role == "Admin")
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('jenisbarang.view')}}"><span class="ml-1 item-text">
                                Jenis Barang</span></a>
                    </li>
                </ul>
                @endif

                @if (
                auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS" || auth()->user()->role ==
                "Kepala Sekolah"
                )
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('pengaduan.view')}}"><span class="ml-1 item-text">
                                Pengaduan</span></a>
                    </li>
                </ul>
                @endif

                @if (auth()->user()->role == "Admin")
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('statuspengaduan.view')}}"><span
                                class="ml-1 item-text">Status
                                Pengaduan</span></a>
                    </li>
                </ul>
            </li>
            @endif
            @endif

            @if (auth()->user()->role == "Admin")
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('nota.upload')}}">
                    <i class="fe fe-file fe-16"></i>
                    <span class="ml-3 item-text">Unggah Nota</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == "Bendahara")
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('nota.arsip')}}">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Arsip Nota</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == "Admin")
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('role.view')}}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Peran</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == "Admin")
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('user.view')}}">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Pengguna</span>
                </a>
            </li>
            @endif

        </ul>
    </nav>
</aside>