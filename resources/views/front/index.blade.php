@extends('front._root')

@section('content')

<div class="ui inverted vertical masthead center aligned segment" style="position: relative">
    <div class="ui text container">
        <h1 class="ui inverted header hero-title">Portal Organisasi Mahasiswa</h1>
        <h2>Web Portal UKM & ORMAWA di Politeknik Negeri Manado</h2>
        <a href="#ukms-list" id="goto" class="ui huge primary button">
            Lihat daftar<i class="right arrow icon"></i>
        </a>
    </div>
    {{-- <div style="position: absolute; top: 0; width: 100%; height: 100%; z-index: -1;">
        <video id="video" style="width:100%; height:100%">
            <source src="{{asset('/videos/hero.mp4')}}" type="video/mp4" />
        </video>
    </div> --}}
</div>
{{-- <div class="ui vertical stripe segment"> --}}
    <br />
    <h1 id="ukms-list" class="ui horizontal divider header">
        <i class="tag icon"></i>
        Daftar UKM & ORMAWA Terdaftar
    </h1>
    <div class="ui stackable four column grid container list-ukm">
        @foreach($listUkm as $ukm)
        <div class="column">
            <div class="ui circular rotate reveal image segment">
                <img src="{{asset('/storage/logos/'.$ukm->logo)}}" class="visible content ukm-logo">
                <img src="{{asset('/storage/logos/'.$ukm->logo)}}" class="hidden  content ukm-logo">
            </div>
            <a href="{{route('ukm-page', ['id' => $ukm->id])}}" class="ukm-name">{{$ukm->name}}</a>
        </div>
        @endforeach
    </div>
    <div class="ui horizontal divider header"></div>
{{-- </div> --}}
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a#goto").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
        
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
            } // End if
        });
    });
</script>
@endsection