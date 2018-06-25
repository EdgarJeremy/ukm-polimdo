<div class="ukm-header-menu">
    <div class="ui borderless inverted menu first">
        <div class="ui container">
            <div class="ui borderless fluid three item menu">
                <div class="item">
                    <img src="{{asset('/images/logo-poli.png')}}">
                </div>
                <div class="centered">
                    <h1>UKM - English Club</h1>
                    <p>Web Portal<br />Politeknik Negeri Manado</p>
                </div>
                <div class="item">
                    <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="ui fluid seven item borderless blue inverted pointing menu second">
        <div class="ui container">

            <!-- Portal -->
            <a href="{{route('root')}}" class="item">Ke Portal</a>

            <!-- Home -->
            <a class="header active item" href="{{URL::current()}}">Home</a>

            <!-- Kegiatan -->
            <div class="ui dropdown link pointing item">
                <span class="text">Kegiatan</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="#" class="item">Informasi Kegiatan</a>
                    <a href="#" class="item">Pengumuman</a>
                </div>
            </div>

            <!-- Tentang -->
            <div class="ui dropdown link pointing item">
                <span class="text">Tentang</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="#" class="item">Profil UKM</a>
                    <a href="#" class="item">Visi & Misi</a>
                    <a href="#" class="item">Logo UKM</a>
                    <a href="#" class="item">FAQ</a>
                </div>
            </div>

            <!-- Kontak -->
            <div class="ui dropdown link pointing item">
                <span class="text">Kontak</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="#" class="item">Hubungi Kami</a>
                </div>
            </div>

            <!-- Galeri -->
            <div class="ui dropdown link pointing item">
                <span class="text">Galeri</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item" class="item">
                        <span class="text">Foto</span>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <a href="#" class="item">2015</a>
                            <a href="#" class="item">2016</a>
                            <a href="#" class="item">2017</a>
                            <a href="#" class="item">2018</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Keanggotaan -->
            <div class="ui dropdown link pointing item">
                <span class="text">Keanggotaan</span>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="#" class="item">Struktur Organisasi</a>
                    <a href="#" class="item">Informasi Anggota</a>
                    <a href="#" class="item">Pendaftaran Anggota Baru</a>
                </div>
            </div>
        </div>
    </div>
</div>