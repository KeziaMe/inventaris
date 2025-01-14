<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <img src="{{asset('backend/assets/images/logo2.png')}}" alt="Logo" style="width: 50px; height: 50px;"
          class="navbar-brand-img brand-sm" />
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
    </ul>

    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Menu</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
      </li>

      <li class="nav-item w-100">
        <a class="nav-link" href="{{route('form_pengaduan')}}">
          <i class="fe fe-credit-card fe-16"></i>
          <span class="ml-3 item-text">Form Pengaduan</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-grid fe-16"></i>
          <span class="ml-3 item-text">Kelola Data</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{route('ruangan.view')}}"><span class="ml-1 item-text">Kelola Data
                Ruangan</span></a>
          </li>
        </ul>

        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{route('barang.view')}}"><span class="ml-1 item-text">Kelola Data
                Barang</span></a>
          </li>
        </ul>

        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{route('jenisbarang.view')}}"><span class="ml-1 item-text">Kelola Data
                Jenis Barang</span></a>
          </li>
        </ul>

        <ul class="collapse list-unstyled pl-4 w-100" id="tables">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{route('pengaduan.view')}}"><span class="ml-1 item-text">Kelola Data
                Pengaduan</span></a>
          </li>
        </ul>
      </li>

      <li class="nav-item w-100">
        <a class="nav-link" href="{{route('nota')}}">
          <i class="fe fe-file fe-16"></i>
          <span class="ml-3 item-text">Unggah Nota</span>
        </a>
      </li>

      <li class="nav-item w-100">
        <a class="nav-link" href="{{route('user.view')}}">
          <i class="fe fe-user fe-16"></i>
          <span class="ml-3 item-text">User</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>