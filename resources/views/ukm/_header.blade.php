<div class="ukm-header-menu">
    <div class="ui borderless inverted menu first">
        <div class="ui container">
            <div class="ui borderless fluid three item menu">
                <div class="item">
                    <img src="{{asset('/images/logo-poli.png')}}">
                </div>
                <div class="centered">
                    <h1>{{$ukm->name}}</h1>
                    <p>Web Portal<br />Politeknik Negeri Manado</p>
                </div>
                <div class="item">
                    <img src="{{asset('/storage/logos/'.$ukm->logo)}}">
                </div>
            </div>
        </div>
    </div>

    <div class="ui fluid seven item borderless pointing menu second">
        <div class="ui container">

            <!-- Portal -->
            <a class="ui header item" href="{{route('root')}}">Ke Portal</a>

            <!-- Home -->
            <a class="ui header {{Route::currentRouteName() === 'ukm-page' ? 'item-active' : ''}} item" href="{{route('ukm-page', ['id' => $id])}}">Home</a>

            <!-- Kegiatan -->
            <div class="ui dropdown item pointing {{
                Route::currentRouteName() === 'ukm-kegiatan' ||
                Route::currentRouteName() === 'ukm-baca_kegiatan' || 
                Route::currentRouteName() === 'ukm-pengumuman' ? 'item-active' : ''}} header">
                <span class="">Kegiatan</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="{{route('ukm-kegiatan', ['id' => $id])}}" class="item">Informasi Kegiatan</a>
                    <a href="{{route('ukm-pengumuman', ['id' => $id])}}" class="item">Pengumuman</a>
                </div>
            </div>

            <!-- Keanggotaan -->
            <div class="ui dropdown link pointing item {{
                Route::currentRouteName() === 'ukm-struktur_organisasi' ||
                Route::currentRouteName() === 'ukm-keanggotaan' ||
                Route::currentRouteName() === 'ukm-pendaftaran' ? 'item-active' : ''
            }} header">
                <span class="">Keanggotaan</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="{{route('ukm-struktur_organisasi', ['id' => $id])}}" class="item">Struktur Organisasi</a>
                    <a href="{{route('ukm-keanggotaan', ['id' => $id])}}" class="item">Informasi Anggota</a>
                    @if($ukm->registration)
                    <a href="{{route('ukm-pendaftaran', ['id' => $id])}}" class="item">Pendaftaran Anggota Baru</a>
                    @endif
                </div>
            </div>

            <!-- Tentang -->
            <div class="ui dropdown link pointing item {{
                Route::currentRouteName() === 'ukm-tentang' ||
                Route::currentRouteName() === 'ukm-faq' ? 'item-active' : ''}} header">
                <span class="">Tentang</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="{{route('ukm-tentang', ['id' => $id])}}" class="item">Tentang UKM</a>
                    <a href="{{route('ukm-faq', ['id' => $id])}}" class="item">FAQ</a>
                </div>
            </div>

            <!-- Kontak -->
            <div class="ui dropdown link pointing item {{
                Route::currentRouteName() === 'ukm-kontak' ? 'item-active' : ''}} header">
                <span class="">Kontak</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="{{route('ukm-kontak', ['id' => $id])}}" class="item">Hubungi Kami</a>
                </div>
            </div>

            <!-- Galeri -->
            <a class="ui header {{Route::currentRouteName() === 'ukm-galeri' ? 'item-active' : ''}} item" href="{{route('ukm-galeri', ['id' => $id])}}">Galeri</a>

        </div>
    </div>
</div>