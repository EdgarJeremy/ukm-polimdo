@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Tentang English Club
        </h1>
        <span>Informasi tentang UKM kami ada disini</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <h1>Profil UKM</h1>
        <p>{{$ukm->profile}}</p>
    </div>
</div>

<div class="row">
    <div class="column">
        <h1>Logo</h1>
        <img src="{{asset('/storage/logos/'.$ukm->logo)}}" class="img-tentang">
        <h3>Arti Logo</h3>
        <p>{{$ukm->logo_meaning}}</p>
    </div>
</div>

<div class="row">
    <div class="column">
        <h1>Visi & Misi</h1>
        <h3>Visi</h3>
        <p>{{$ukm->vision}}</p>
        <h3>Misi</h3>
        <p>{{$ukm->mission}}</p>
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Tentang</div>
@endsection