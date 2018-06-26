@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Keanggotaan
            </h1>
            <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <div class="ui icon input fluid">
            <input type="text" placeholder="Cari...">
            <i class="search icon"></i>
        </div>
        <table class="ui olive table fixed sortable single line">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Prodi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i
                < 10; $i++) <tr>
                    <td>Lorem</td>
                    <td>16024025</td>
                    <td>Teknik Elektro</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero quaerat quibusdam sequi fugit excepturi minus perferendis optio pariatur delectus aut suscipit quasi veritatis eveniet, nam voluptatem laborum eligendi repellat modi.</td>
                    <td><a class="ui teal tag label">Aktif</a></td>
                    </tr>
                    @endfor
            </tbody>
        </table>
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page Kegiatan</div>
@endsection