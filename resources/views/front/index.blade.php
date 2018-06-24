@extends('front._root')

@section('content')

<div class="ui inverted vertical masthead center aligned segment">
    <div class="ui text container">
        <h1 class="ui inverted header hero-title">Portal Unit Kegiatan Mahasiswa</h1>
        <h2>Sistem Informasi manajemen konten Unit Kegiatan Mahasiswa Politeknik Negeri Manado</h2>
        <div class="ui huge primary button">
            Lihat daftar UKM<i class="right arrow icon"></i>
        </div>
    </div>
</div>
{{-- <div class="ui vertical stripe segment"> --}}
    <br />
    <h1 class="ui horizontal divider header">
        <i class="tag icon"></i>
        Daftar UKM Terdaftar
    </h1>
    <div class="ui four column grid container list-ukm">
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="visible content">
                <img src="{{asset('/images/templates/semantic-ui/wireframe/white-image.png')}}" class="hidden content">
            </div>
            <h3 class="ukm-name">Lorem Ipsum</h2>
        </div>
    </div>
    <hr />
{{-- </div> --}}

@endsection