<!-- Sidebar -->
<ul class="navbar-nav bg-primary .bg-darken-xl sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="assets/index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-nurse"></i>
        </div>
        <div class="sidebar-brand-text mx-3">pmb eka</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('kepala')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('kepala/dashboard*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/kepala/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('kepala/laporan') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/kepala/laporan">
                <i class="fas fa-book"></i>
                <span>Laporan</span></a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('kepala/rekam_medis*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekam_medis"
                aria-expanded="true" aria-controls="rekam_medis">
                <i class="fas fa-book-medical"></i>
                <span>Laporan Rekam Medis</span>
            </a>
            <div id="rekam_medis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/kepala/rekam_medis/umum">Umum</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/bersalin">Bersalin</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/kb">KB</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/imunisasi">Imunisasi</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/balita">Balita</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/kehamilan">Kehamilan</a>
                    <a class="collapse-item" href="/kepala/rekam_medis/nifas">Nifas</a>
                </div>
            </div>
        </li>
    @endcan

    @can('admin')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('admin/pasien') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/pasien">
                <i class="fas fa-user-injured"></i>
                <span>Pasien</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('admin/obat') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/obat">
                <i class="fas fa-capsules"></i>
                <span>Obat</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('admin/penanganan') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/penanganan">
                <i class="fas fa-first-aid"></i>
                <span>Layanan</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('admin/pengguna') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/pengguna">
                <i class="fas fa-users"></i>
                <span>Pengguna</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('admin/laporan') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/admin/laporan">
                <i class="fas fa-book"></i>
                <span>Laporan</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('admin/rekam_medis*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekam_medis"
                aria-expanded="true" aria-controls="rekam_medis">
                <i class="fas fa-book-medical"></i>
                <span>Laporan Rekam Medis</span>
            </a>
            <div id="rekam_medis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/rekam_medis/umum">Umum</a>
                    <a class="collapse-item" href="/admin/rekam_medis/bersalin">Bersalin</a>
                    <a class="collapse-item" href="/admin/rekam_medis/kb">KB</a>
                    <a class="collapse-item" href="/admin/rekam_medis/imunisasi">Imunisasi</a>
                    <a class="collapse-item" href="/admin/rekam_medis/balita">Balita</a>
                    <a class="collapse-item" href="/admin/rekam_medis/kehamilan">Kehamilan</a>
                    <a class="collapse-item" href="/admin/rekam_medis/nifas">Nifas</a>
                </div>
            </div>
        </li>
    @endcan


    @can('user')
        <!-- Nav Item - Charts -->
        <li class="nav-item {{ Request::is('user/pasien') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/user/pasien">
                <i class="fas fa-user-injured"></i>
                <span>Pasien</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Request::is('user/rekam_medis*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-clipboard-list"></i>
                <span>Rekam Medis</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/user/rekam_medis/umum">Umum</a>
                    <a class="collapse-item" href="/user/rekam_medis/bersalin">Bersalin</a>
                    <a class="collapse-item" href="/user/rekam_medis/kb">KB</a>
                    <a class="collapse-item" href="/user/rekam_medis/imunisasi">Imunisasi</a>
                    <a class="collapse-item" href="/user/rekam_medis/balita">Balita</a>
                    <a class="collapse-item" href="/user/rekam_medis/kehamilan">Kehamilan</a>
                    <a class="collapse-item" href="/user/rekam_medis/nifas">Nifas</a>
                </div>
            </div>
        </li>

        <li class="nav-item {{ Request::is('user/transaksi*') ? 'active' : '' }}">
            <a class="nav-link pt-0 pb-0" href="/user/transaksi/create">
                <i class="fas fa-money-bill-wave"></i>
                <span>Transaksi</span></a>
        </li>
        {{--
        <li class="nav-item {{ Request::is('user/resep*') ? 'active' : '' }}">
            <a class="nav-link pb-0" href="/user/resep/create">
                <i class="fas fa-tablets"></i>
                <span>Resep Obat</span></a>
        </li> --}}
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('setting*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#akun"
            aria-expanded="true" aria-controls="akun">
            <i class="fas fa-cog"></i>
            <span>Akun</span>
        </a>
        <div id="akun" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/setting">Profile</a>
                <a class="collapse-item" href="/setting/{{ auth()->user()->id }}/edit ">Edit Profile</a>
                <a class="collapse-item" href="/setting/password">Ubah Password</a>
            </div>
        </div>
    </li>
</ul>
<!-- End of Sidebar -->
