<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo-sekolah.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SMK DEWANTARA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Auth::user()->level === 2 && Auth::user()->siswa)
                <div class="image">
                    <img src="{{ asset('storage/' . Auth::user()->siswa->photo) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
            @else
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
            @endif
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }} @if (Auth::user()->level === 0)
                        <span class="right badge badge-primary">Admin</span>
                    @elseif (Auth::user()->level === 1)
                        <span class="right badge badge-primary">Guru</span>
                    @elseif (Auth::user()->level === 2)
                        <span class="right badge badge-primary">Siswa</span>
                    @else
                        <span class="right badge badge-primary">Unknown</span>
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->level === 0)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('user') }}"
                                    class="nav-link {{ Request::is('user') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guru') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('siswa') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mapel') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Mata Pelajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelas') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tahun-ajaran') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Tahun Ajaran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('jurusan') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Jurusan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->level === 1 || Auth::user()->level === 0)
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Pengolahan Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('data-nilai') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Nilai</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/layout/top-nav.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Data Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Data Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/layout/boxed.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laporan Data Nilai</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->level === 2)
                    <li class="nav-item ">
                        <a href="{{ route('nilai-siswa') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Informasi Nilai
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-header">SETTING</li>
                <li class="nav-item">
                    <a href="{{ route('user.update') }}" class="nav-link">
                        <i class="nav-icon fa fa-lock"></i>
                        <p>
                            Ganti Password
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('keluar') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
