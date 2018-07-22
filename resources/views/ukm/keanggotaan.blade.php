@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Keanggotaan
            </h1>
            <span>Daftar anggota resmi {{$ukm->name}}</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama anggota..." value={{Input::get( 'q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
        </form>
        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Angkatan</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Program Studi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($members) > 0) @foreach($members as $key=>$member)
                <tr>
                    <td>{{$member->full_name}}</td>
                    <td>{{$member->nim}}</td>
                    <td>{{$member->semester}}</td>
                    <td>{{$member->generation}}</td>
                    <td>{{$member->address}}</td>
                    <td>{{$member->major->name}}</td>
                    <td>{{$member->study_program->name}}</td>
                </tr>
                @endforeach @else
                <tr>
                    <td colspan="7" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7">
                        @if ($members->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $members->previousPageUrl() }}" class="{{ ($members->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i
                            <=$members->lastPage(); $i++)
                                <a href="{{ $members->url($i) }}" class="{{ ($members->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $members->nextPageUrl() }}" class="{{ ($members->currentPage() == $members->lastPage()) ? ' disabled' : '' }} item">
                                    Next
                                </a>
                        </div>
                        @endif
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page Keanggotaan</div>
@endsection