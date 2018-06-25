@extends('front._root')

@section('content')

<div class="ui inverted vertical masthead center aligned segment" style="position: relative">
    <div class="ui text container">
        <h1 class="ui inverted header hero-title">Portal Unit Kegiatan Mahasiswa</h1>
        <h2>Sistem Informasi manajemen konten Unit Kegiatan Mahasiswa Politeknik Negeri Manado</h2>
        <div class="ui huge primary button">
            Lihat daftar UKM<i class="right arrow icon"></i>
        </div>
    </div>
    <div style="position: absolute; top: 0; width: 100%; height: 100%; z-index: -1;">
        <video id="video" style="width:100%; height:100%">
            <source src="{{asset('/videos/hero.mp4')}}" type="video/mp4" />
        </video>
    </div>
</div>
{{-- <div class="ui vertical stripe segment"> --}}
    <br />
    <h1 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Daftar UKM Terdaftar
    </h1>
    <div class="ui stackable four column grid container list-ukm">
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <a href="{{route('ukm-page', ['id' => 1])}}" class="ukm-name">Lorem Ipsum</a>
        </div>
    </div>
    <div class="ui horizontal divider header"></div>
{{-- </div> --}}

@endsection