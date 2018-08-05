<div class="ui inverted huge fixed fluid menu">
    <a href="{{URL::to('/')}}" target="_blank" class="header item"><img src="{{asset('/images/logo-poli.png')}}" alt="">&nbsp;&nbsp;Portal Unit Kegiatan Mahasiswa</a>
    <div class="right menu">
        <a class="item"><i class="cogs icon"></i> Pengaturan</a>
        <a class="item"><i class="user outline icon"></i> Profil ({{ Auth::user()->name }})</a>
        <a href="{{route('super-logout')}}" class="item"><i class="sign out alternate icon"></i> Logout</a>
    </div>
</div>