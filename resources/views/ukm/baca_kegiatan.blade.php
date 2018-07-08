@extends('ukm._root')
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <a href="{{route('ukm-kegiatan', ['id' => $id])}}" class="ui button">Kembali ke index kegiatan</a>
    </div>
</div>

<div class="row">
    <div class="five wide left floated column">
        <div class="ui segment">
            <h3 class="ui header">
                Kegiatan Lainnya
            </h3>
            <hr />
            @foreach($activities as $act)
            <i class="calendar alternate icon"></i> <a href="{{route('ukm-baca_kegiatan', ['id' => $id, 'id_kegiatan' => $act->id])}}">{{$act->name}}</a>
            @endforeach
            <hr />
        </div>
    </div>
    <div class="eleven wide column">
        <div class="ui segment">
            <h2 class="ui header">
                {{$activity->name}}
            </h2>
            <span><i class="calendar alternate icon"></i> {{$activity->implementation_date}}</span><br />
            <span><i class="circle {{$activity->status === 'Belum Terlaksana' ? 'outline' : ''}} icon"></i> {{$activity->status}}</span>
            <div class="ui hidden divider"></div>
            <img src="{{asset('/storage/activities/'.$activity->file)}}" alt="Cover">
            <hr />
            <p>{!!$activity->content!!}</p>
            <div class="ui divider"></div>
        </div>
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page {{$activity->name}}</div>

@endsection