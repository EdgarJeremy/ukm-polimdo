{{--
<div class="ui footer secondary segment">
    <div class="ui center aligned container">
        <p>
            Blog template built for Semantic-UI by <a href="https://github.com/semantic-ui-forest">@Semantic-UI-Forest</a>.
        </p>
        <a href="blog.html#">Back to top</a>
    </div>
</div> --}}

<div class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="three wide column">
                <h4 class="ui inverted header">
                    Aktifitas
                </h4>
                <div class="ui inverted link list">
                    <a class="item" href="{{route('ukm-kegiatan', ['id' => $id])}}"> Kegiatan</a>
                    <a class="item" href="{{route('ukm-pengumuman', ['id' => $id])}}"> Pengumuman</a>
                    @if($ukm->registration)
                    <a class="item" href="{{route('ukm-pendaftaran', ['id' => $id])}}"> Pendaftaran</a>
                    @endif
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">
                    UKM
                </h4>
                <div class="ui inverted link list">
                        <a class="item" href="{{route('ukm-tentang', ['id' => $id])}}"> Tentang</a>
                        <a class="item" href="{{route('ukm-faq', ['id' => $id])}}"> FAQ</a>
                        <a class="item" href="{{route('ukm-kontak', ['id' => $id])}}"> Hubungi Kami</a>
                        <a class="item" href="{{route('ukm-galeri', ['id' => $id])}}"> Galeri</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">
                    {{$ukm->name}}
                </h4>
                <p>
                    {{$ukm->profile}}
                </p>
            </div>
        </div>
    </div>
</div>