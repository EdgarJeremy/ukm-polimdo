@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            FAQ
        </h1>
        <span>Pertanyaan yang sering ditanyakan</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        @foreach($ukm->faqs as $faq) 
            <h1 class="ui header">
            Q : {{$faq->q}}
            </h1>
            <div class="ui hidden divider"></div>
            <p> A : {{$faq->a}}</p>
            <div class="ui divider"></div>
        @endforeach
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Kegiatan</div>
@endsection