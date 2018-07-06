@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class=" fluid text-center">
            Selamat datang di {{$ukm->name}}
        </h2>
        <p>{{$ukm->profile}}</p>
    </div>
</div>

<div class="row">
    <div class="five wide left floated column">
        <div class="ui segment">
            <h3 class="ui header">
                Pengumuman
            </h3>
            <hr /> @if(count($announcements) > 0) @foreach($announcements as $key=>$announcement)
            <img style="height: 200px;object-fit: cover" src="{{asset('/storage/announcements/'.$announcement->file)}}" alt="Pengumuman">
            <br /><br />
            <p>
                <i class="file outline icon"></i> {{$announcement->name}} <br />
                <i class="calendar alternate outline icon"></i> {{$announcement->implementation_date}} <br />
                <i class="map marker alternate icon"></i> {{$announcement->place}}
            </p>
            <hr /> @endforeach @else Belum ada data @endif
        </div>
    </div>
    <div class="eleven wide column">
        <h2>Kegiatan Terbaru</h2>
        <hr /> 
        @if(count($activities) > 0) @foreach($activities as $activity)
        <div class="ui segment">
            <h2 class="ui header">
                {{$activity->name}}
            </h2>
            <span><i class="calendar alternate icon"></i> {{$activity->implementation_date}}</span><br />
            <span><i class="circle {{$activity->status === 'Belum Terlaksana' ? 'outline' : ''}} icon"></i> {{$activity->status}}</span>
            <div class="ui hidden divider"></div>
            <img src="{{asset('/storage/activities/'.$activity->file)}}" alt="Cover">
            <hr />
            <p>
                {{substr(strip_tags($activity->content), 0, 300)}} [<a href="#">Lebih lanjut</a>]
            </p>
            <div class="ui divider"></div>
        </div>
        @endforeach
        <div class="ui basic segment">
            <div class="ui basic circular huge button">
                <a href="{{route('ukm-kegiatan', ['id' => $ukm->id])}}">Selengkapnya</a>
            </div>
        </div>
        @else
        <h3>Belum ada kegiatan</h3>
        @endif
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Home</div>
@endsection