@extends('ukm._root')
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
        Daftar Pengumuman
        </h1>
        <span>Daftar pengumuman UKM {{$ukm->name}}</span>
    </div>
</div>

<div class="row ann">
    @if(count($announcements) > 0) @foreach($announcements as $announcement)
    <div class="row">
        <div class="ui segment">
            <h2 class="ui header">
                <a href="{{route('ukm-baca_pengumuman', ['id' => $id, 'id_pengumuman' => $announcement->id])}}">
                    {{$announcement->name}}
                </a>
            </h2>
            <span><i class="calendar alternate icon"></i> {{$announcement->implementation_date}}</span><br /><br />
            <a href="{{route('ukm-baca_pengumuman', ['id' => $id, 'id_pengumuman' => $announcement->id])}}" class="ui button green">Detail</a>
            <div class="ui divider"></div>
        </div>
    </div>
    <br />
    @endforeach @else
    <h3>Belum ada pengumuman</h3>
    @endif
    @if ($announcements->lastPage() > 1)
    <div class="ui pagination menu">
        <a href="{{ $announcements->previousPageUrl() }}" class="{{ ($announcements->currentPage() == 1) ? ' disabled' : '' }} item">
            Previous
        </a> @for ($i = 1; $i <=$announcements->lastPage(); $i++)
        <a href="{{ $announcements->url($i) }}" class="{{ ($announcements->currentPage() == $i) ? ' active' : '' }} item">
                {{ $i }}
            </a> @endfor
        <a href="{{ $announcements->nextPageUrl() }}" class="{{ ($announcements->currentPage() == $announcements->lastPage()) ? ' disabled' : '' }} item">
            Next
        </a>
    </div>
    @endif
</div>

<div class="ui divider horizontal end-page">Akhir page Pengumuman</div>

@endsection