<ul class="nav">
    <li class="nav-item nav-category">
        <span class="nav-link">GENERAL</span>
    </li>
    <li class="nav-item">
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
        <div class="collapse" id="berita">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita')}}">Buat baru</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita/draft')}}">Draft</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url(Auth::User()->role.'/berita/list-berita')}}">Daftar Berita</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url(Auth::User()->role.'/pengguna')}}">
            <span class="menu-title">Pengguna</span>
            <i class="icon-user menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url(Auth::User()->role.'/statistik')}}">
            <span class="menu-title">Statistik Pengunjung</span>
            <i class="icon-graph menu-icon"></i>
        </a>
    </li>
    <li class="nav-item nav-category">
        <span class="nav-link">PENGATURAN</span>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url(Auth::User()->role.'/kategori')}}">
            <span class="menu-title">Kategori</span>
            <i class="icon-tag menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url(Auth::User()->role.'/iklan')}}">
            <span class="menu-title">Iklan</span>
            <i class="icon-chart menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#administrator" aria-expanded="false" aria-controls="administrator">
            <span class="menu-title">Administrator</span>
            <i class="icon-book-open menu-icon"></i>
        </a>
        <div class="collapse" id="administrator">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url(Auth::User()->role.'/administrator')}}">Akun baru</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url(Auth::User()->role.'/administrator/list-akun')}}">Daftar akun</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item nav-category">
        <span class="nav-link">
            <a class="btn btn-block btn-danger"  href="{{url('logout')}}">KELUAR AKUN</a>
        </span>
    </li>
</ul>