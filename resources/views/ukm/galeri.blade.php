@extends('ukm._root') 
@section('content')


<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Galeri {{$tahun}}
        </h2>
        <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="ui four column grid container">
        @for($i = 0; $i < 5; $i++)
        <div class="row">
            <div class="column">
                <img src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}">
            </div>
            <div class="column">
                <img src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}">
            </div>
            <div class="column">
                <img src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}">
            </div>
            <div class="column">
                <img src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}">
            </div>
        </div>
        @endfor
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Galeri</div>
@endsection