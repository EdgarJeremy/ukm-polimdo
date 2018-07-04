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
                    Route::currentRouteName() === 'admin-home' ||
                    Route::currentRouteName() === 'admin-message' ? 'active' : ''
                }} content">
                    <a href="{{route('admin-home')}}" class="{{Route::currentRouteName() === 'admin-home' ? 'active' : ''}} item"><i class="home icon"></i>&nbsp;&nbsp;&nbsp;Beranda</a>
                    <a href="{{route('admin-message')}}" class="{{Route::currentRouteName() === 'admin-message' ? 'active' : ''}} item"><i class="envelope outline icon"></i>&nbsp;&nbsp;&nbsp;Pesan Masuk</a>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i> Konfigurasi
                </div>
                <div class="{{
                    Route::currentRouteName() === 'admin-profile' ||
                    Route::currentRouteName() === 'admin-user' ? 'active' : ''
                }} content">
                    <a href="{{route('admin-profile')}}" class="{{Route::currentRouteName() === 'admin-profile' ? 'active' : ''}} item"><i class="building icon"></i>&nbsp;&nbsp;&nbsp;Profil UKM</a>
                    <a href="{{route('admin-user')}}" class="{{Route::currentRouteName() === 'admin-user' ? 'active' : ''}} item"><i class="user icon"></i>&nbsp;&nbsp;&nbsp;Pengguna</a>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i> Keuangan
                </div>
                <div class="{{
                    Route::currentRouteName() === 'admin-cash' ||
                    Route::currentRouteName() === 'admin-transaction' ||
                    Route::currentRouteName() === 'admin-report' ? 'active' : ''
                }} content">
                    <a href="{{route('admin-cash')}}" class="{{Route::currentRouteName() === 'admin-cash' ? 'active' : ''}} item"><i class="money bill alternate icon"></i>&nbsp;&nbsp;&nbsp;Kas</a>
                    <a href="{{route('admin-transaction')}}" class="{{Route::currentRouteName() === 'admin-transaction' ? 'active' : ''}} item"><i class="money bill alternate icon"></i>&nbsp;&nbsp;&nbsp;Transaksi</a>
                    <a href="{{route('admin-report')}}" class="{{Route::currentRouteName() === 'admin-report' ? 'active' : ''}} item"><i class="table icon"></i>&nbsp;&nbsp;&nbsp;Laporan Keuangan</a>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i> File
                </div>
                <div class="content">
                    <a class="item"><i class="envelope open icon"></i>&nbsp;&nbsp;&nbsp;Edaran</a>
                    <a class="item"><i class="picture icon"></i>&nbsp;&nbsp;&nbsp;Galeri</a>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i> Keanggotaan
                </div>
                <div class="content">
                    <a class="item"><i class="sitemap icon"></i>&nbsp;&nbsp;&nbsp;Struktur Organisasi</a>
                    <a href="" class="item"><i class="users icon"></i>&nbsp;&nbsp;&nbsp;Informasi Anggota</a>
                    <a href="" class="item"><i class="users icon"></i>&nbsp;&nbsp;&nbsp;Pendaftaran Anggota Baru</a>
                </div>
                <div class="title">
                    <i class="dropdown icon"></i> Kegiatan
                </div>
                <div class="content">
                    <a href="" class="item"><i class="calendar alternate outline icon"></i>&nbsp;&nbsp;&nbsp;Informasi Kegiatan</a>
                    <a href="" class="item"><i class="clock outline icon"></i>&nbsp;&nbsp;&nbsp;Rapat & Pertemuan</a>
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