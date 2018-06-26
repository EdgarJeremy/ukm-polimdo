@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            FAQ
        </h1>
        <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        @for($i = 0; $i
        < 5; $i++) <h1 class="ui header">
            Q : Lorem ipsum dolor sit amet?
            </h1>
            <div class="ui hidden divider"></div>
            <p>
                A : This blog post shows a few different types of content that's supported and styled with Semantic-UI. Basic typesetting, list,
                and code are all supported.
            </p>
            <div class="ui divider"></div>
            @endfor
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Kegiatan</div>
@endsection