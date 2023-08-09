<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('mentor/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Data Member</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/member/member*') ? 'active' : '' }}" href="{{ url('mentor/member/member') }}">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/member/member_kelas*') ? 'active' : '' }}" href="{{ url('mentor/member/member_kelas') }}">Kelas Member</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Data Kelas</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/kelas/kelas*') ? 'active' : '' }}" href="{{ url('mentor/kelas/kelas') }}">Kelas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/kelas_saya/kelas_saya*') ? 'active' : '' }}" href="{{ url('mentor/kelas_saya/kelas_saya') }}">Kelas Publish</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/kelas_saya/ditolak*') ? 'active' : '' }}" href="{{ url('mentor/kelas_saya/ditolak') }}">Kelas Ditolak</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#profile" aria-expanded="false" aria-controls="profile">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Akun</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="profile">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/profil/profil*') ? 'active' : '' }}" href="{{ url('mentor/profil/profil') }}">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mentor/pendidikan/pendidikan*') ? 'active' : '' }}" href="{{ url('mentor/pendidikan/pendidikan') }}">Riwayat Pendidikan</a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
