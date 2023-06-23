<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla Admin</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Admin</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="dropdown active">
          <a href="#" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Data </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i> <span>Data Akun</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ url('admin/akun/admin')}}">Admin</a></li>
            <li><a class="nav-link" href="{{ url('admin/akun/peserta')}}">Peserta</a></li>
            <li><a class="nav-link" href="{{ url('admin/akun/mentor')}}">Mentor</a></li>
            <li><a class="nav-link" href="{{ url('admin/akun/user') }}">User</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Master</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('admin/kategori/kategori') }}">Kategori</a></li>
              <li><a class="nav-link" href="layout-transparent.html">Syarat & Ketentuan</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Kelas</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('admin/kelas/index') }}">Kelas Masuk</a></li>
              <li><a class="nav-link" href="{{ url('admin/kelas/berhasil') }}">Kelas Berhasil</a></li>
            </ul>
          </li>
      </ul>
  </div>
