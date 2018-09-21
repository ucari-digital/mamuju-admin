<ul class="nav">
    <li class="nav-item nav-category">
        <span class="nav-link">GENERAL</span>
    </li>
    <li class="nav-item @yield('menu-dashboard')">
        <a class="nav-link" href="{{url(Auth::User()->role.'/')}}">
            <span class="menu-title">Dashboard</span>
            <i class="icon-speedometer menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#berita" aria-expanded="false" aria-controls="berita">
            <span class="menu-title">Berita</span>
            <i class="icon-book-open menu-icon"></i>
        </a>
        <div class="collapse @yield('menu-berita')" id="berita">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item @yield('subberita-baru')"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita')}}">Buat baru</a></li>
                <li class="nav-item @yield('subberita-draft')"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita/draft')}}">Draft</a></li>
                <li class="nav-item @yield('subberita-list')"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita/list-berita')}}">Daftar Berita</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item nav-category">
        <span class="nav-link">
            <a class="btn btn-block btn-danger"  href="{{url('logout')}}">KELUAR AKUN</a>
        </span>
    </li>
</ul>