@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <a href="{{route('ukm-pengumuman', ['id' => $id])}}" class="ui button">Kembali ke index pengumuman</a>
    </div>
</div>

<div class="row" id="article">
    <div class="four wide left floated column">
        <div class="ui segment">
            <h3 class="ui header">
                Daftar Pengumuman
            </h3>
            <hr />
            @foreach($announcements as $ann)
            <p>
                <a href="{{route('ukm-baca_pengumuman', ['id' => $id, 'id_pengumuman' => $ann->id])}}">{{$ann->name}}</a><br />
                {{-- <b>#1</b> Etiam porta <i>sem malesuada magna mollis euismod</i>. --}}
            </p>
            @endforeach
            <hr />
        </div>
    </div>
    <div class="eleven wide column">

        <h1 class="ui header">
            {{$announcement->name}}
        </h1>
        <span><i class="calendar alternate icon"></i> {{$announcement->implementation_date}}</span>
        <div class="ui horizontal divider"></div>
        <div class="ui grid">
            <div class="six wide column">
                <img class="img-pengumuman" src="{{asset('/storage/announcements/'.$announcement->file)}}">
            </div>
            <div class="ten wide column">
                <div class="ui raised segment">
                    <a class="ui brown ribbon label">Deskripsi</a>
                    <span>Detail Pengumuman</span>
                    <p>{{$announcement->description}}</p>
                </div>
            </div>
        </div>
        <div class="ui horizontal divider"></div>
        <div class="ui raised segment">
            <a class="ui red ribbon label">Waktu</a> <span>{{$announcement->implementation_date}}</span>
            <hr />
            <a class="ui orange ribbon label">Tempat</a> <span>{{$announcement->place}}</span>
            <hr />
            <a class="ui olive ribbon label">Kontak Person</a> <span>{{$announcement->contact_person}}</span>
        </div>
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Pengumuman</div>
@endsection