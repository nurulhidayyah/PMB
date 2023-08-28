<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto text-uppercase">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('profile') ? 'active' : '' }}" href="/profile">Profil</a>
        </li> --}}
        <li class="nav-item">
            <a class="btn btn-primary" href="/login">masuk</a>
        </li>
    </ul>
</div>
