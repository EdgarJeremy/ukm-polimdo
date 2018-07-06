@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Daftar Kegiatan
            </h1>
            <span>Daftar kegiatan UKM {{$ukm->name}}</span>
    </div>
</div>

<div class="row ann">
    @if(count($activities) > 0) @foreach($activities as $activity)
    <div class="row">
        <div class="ui segment">
            <h2 class="ui header">
                <a href="{{route('ukm-baca_kegiatan', ['id' => $id, 'id_kegiatan' => $activity->id])}}">
                    {{$activity->name}}
                </a>
            </h2>
            <span><i class="calendar alternate icon"></i> {{$activity->implementation_date}}</span><br />
            <span><i class="circle {{$activity->status === 'Belum Terlaksana' ? 'outline' : ''}} icon"></i> {{$activity->status}}</span>
            <div class="ui hidden divider"></div>
            <div class="ui grid">
                <div class="five wide left floated column">
                    <img src="{{asset('/storage/activities/'.$activity->file)}}" alt="Cover">
                </div>
                <div class="eleven wide column">
                    <p>
                        {{substr(strip_tags($activity->content), 0, 500)}} [<a href="{{route('ukm-baca_kegiatan', ['id' => $id, 'id_kegiatan' => $activity->id])}}">Baca</a>]
                    </p>
                </div>
            </div>
            <div class="ui divider"></div>
        </div>
    </div>
    <br />
    @endforeach @else
    <h3>Belum ada kegiatan</h3>
    @endif
    @if ($activities->lastPage() > 1)
    <div class="ui pagination menu">
        <a href="{{ $activities->previousPageUrl() }}" class="{{ ($activities->currentPage() == 1) ? ' disabled' : '' }} item">
            Previous
        </a> @for ($i = 1; $i <=$activities->lastPage(); $i++)
        <a href="{{ $activities->url($i) }}" class="{{ ($activities->currentPage() == $i) ? ' active' : '' }} item">
                {{ $i }}
            </a> @endfor
        <a href="{{ $activities->nextPageUrl() }}" class="{{ ($activities->currentPage() == $activities->lastPage()) ? ' disabled' : '' }} item">
            Next
        </a>
    </div>
    @endif
</div>
<div class="ui divider horizontal end-page">Akhir page Kegiatan</div>
@endsection