<div class="column" id="sidebar">
    <div class="ui secondary vertical fluid menu menu-side">
        {{-- <img src="{{asset('/storage/logos/'.Auth::user()->ukm->logo)}}" alt=""> --}}
        <div class="ui divider"></div>
        <div class="ui">
            <div class="ui accordion">
                <div class="title">
                    <i class="dropdown icon"></i> Menu
                </div>
                <div class="{{
                    Route::currentRouteName() === 'super-home' ? 'active' : ''
                }} content">
                    <a href="{{route('super-home')}}" class="{{Route::currentRouteName() === 'super-home' ? 'active' : ''}} item"><i class="home icon"></i>&nbsp;&nbsp;&nbsp;Beranda</a>
                </div>
            </div>
        </div>

        {{--
        <h3 class="ui left floated header menu-title">Menu</h3>
        <div class="ui clearing divider"></div>
        <a href="{{route('admin-home')}}" class="{{Route::currentRouteName() === 'admin-home' ? 'active' : ''}} item"><i class="home icon"></i>&nbsp;&nbsp;&nbsp;Beranda</a>
        <a href="{{route('admin-message')}}" class="{{Route::currentRouteName() === 'admin-message' ? 'active' : ''}} item"><i class="envelope outline icon"></i>&nbsp;&nbsp;&nbsp;Pesan Masuk</a>
        <div class="ui clearing divider"></div>

        <h3 class="ui left floated header menu-title">Konfigurasi Dasar</h3>
        <div class="ui clearing divider"></div>
        <a class="item"><i class="building icon"></i>&nbsp;&nbsp;&nbsp;Profil UKM</a>
        <a class="item"><i class="user icon"></i>&nbsp;&nbsp;&nbsp;Pengguna</a>
        <div class="ui clearing divider"></div>

        <h3 class="ui left floated header menu-title">Keuangan</h3>
        <div class="ui clearing divider"></div>
        <a class="item"><i class="money bill alternate icon"></i>&nbsp;&nbsp;&nbsp;Kas</a>
        <a class="item"><i class="money bill alternate icon"></i>&nbsp;&nbsp;&nbsp;Transaksi</a>
        <a href="" class="item"><i class="table icon"></i>&nbsp;&nbsp;&nbsp;Laporan Keuangan</a>
        <div class="ui clearing divider"></div>

        <h3 class="ui left floated header menu-title">Surat</h3>
        <div class="ui clearing divider"></div>
        <a class="item"><i class="envelope open icon"></i>&nbsp;&nbsp;&nbsp;Edaran</a>
        <div class="ui clearing divider"></div>

        <h3 class="ui left floated header menu-title">Keanggotaan</h3>
        <div class="ui clearing divider"></div>
        <a class="item"><i class="sitemap icon"></i>&nbsp;&nbsp;&nbsp;Struktur Organisasi</a>
        <a href="" class="item"><i class="users icon"></i>&nbsp;&nbsp;&nbsp;Informasi Anggota</a>
        <a href="" class="item"><i class="users icon"></i>&nbsp;&nbsp;&nbsp;Pendaftaran Anggota Baru</a>
        <div class="ui clearing divider"></div>

        <h3 class="ui left floated header menu-title">Kegiatan</h3>
        <div class="ui clearing divider"></div>
        <a href="" class="item"><i class="calendar alternate outline icon"></i>&nbsp;&nbsp;&nbsp;Informasi Kegiatan</a>
        <a href="" class="item"><i class="clock outline icon"></i>&nbsp;&nbsp;&nbsp;Rapat & Pertemuan</a>
        <div class="ui clearing divider"></div> --}}

    </div>
</div>