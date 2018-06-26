@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Pengumuman
        </h1>
        <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="four wide left floated column">
        <div class="ui segment">
            <h3 class="ui header">
                Daftar Pengumuman
            </h3>
            <hr />
            <p>
                <a href="#">Lorem Ipsum</a><br />
                <b>#1</b> Etiam porta <i>sem malesuada magna mollis euismod</i>.
            </p>
            <hr />
            <p>
                <a href="#">Lorem Ipsum</a><br />
                <b>#2</b> Etiam porta <i>sem malesuada magna mollis euismod</i>.
            </p>
            <hr />
        </div>
    </div>
    <div class="eleven wide column">

        <h1 class="ui header">
            Lorem Ipsum
        </h1>
        <span>March 6, 2017 by <a href="blog.html">Jack</a></span>
        <div class="ui horizontal divider"></div>
        <div class="ui grid">
            <div class="six wide column">
                <img class="img-pengumuman" src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}">
            </div>
            <div class="ten wide column">
                <div class="ui raised segment">
                    <a class="ui brown ribbon label">Deskripsi</a>
                    <span>Detail Pengumuman</span>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus vel eaque illum architecto adipisci perspiciatis molestiae maiores incidunt ipsum ipsa soluta, corporis laudantium quisquam nisi quibusdam, id possimus ex in.</p>
                </div>
            </div>
        </div>
        <div class="ui horizontal divider"></div>
        <div class="ui raised segment">
            <a class="ui red ribbon label">Waktu</a> <span>{{date('Y-M-d H:i:s')}}</span>
            <hr />
            <a class="ui orange ribbon label">Tempat</a> <span>Aula Politeknik Negeri Manado</span>
            <hr />
            <a class="ui teal ribbon label">Agenda</a> <span>Rapat</span>
            <hr />
            <a class="ui olive ribbon label">Kontak Person</a> <span>Edgar Pontoh : 0813-4023-4605</span>
        </div>
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Pengumuman</div>
@endsection