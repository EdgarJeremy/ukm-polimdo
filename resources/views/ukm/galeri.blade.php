@extends('ukm._root') 
@section('content')


<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Galeri
        </h2>
        <span>Lihat kumpulan galeri di {{$ukm->name}}</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Judul File..." value={{Input::get( 'q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
        </form>
        <div class="container">
            <hr />
            <div class="ui fluid five column doubling stackable masonry grid" id="gallery_list">
                @foreach($galleries as $gallery)
                <div class="column">
                    <div class="ui segment">
                        @if(pathinfo($gallery->file, PATHINFO_EXTENSION) === 'mp4' || pathinfo($gallery->file, PATHINFO_EXTENSION) === 'mov' || pathinfo($gallery->file, PATHINFO_EXTENSION) === 'avi' || pathinfo($gallery->file, PATHINFO_EXTENSION) === 'mkv')
                        <video width="100%" controls>
                            <source src="{{asset('/storage/galleries/'.$gallery->file)}}" type="video/mp4"/>
                        </video>
                        @else
                        <img src="{{asset('/storage/galleries/'.$gallery->file)}}" />
                        @endif
                        {{-- <a class="img-link" href="{{asset('/storage/galleries/'.$gallery->file)}}">
                            <img src="{{asset('/storage/galleries/'.$gallery->file)}}" />
                        </a> --}}
                        <hr />
                        <p><i class="align left icon"></i> Judul : {{$gallery->name}}</p>
                        <p><i class="calendar alternate icon"></i> Diupload : {{$gallery->created_at}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@if ($galleries->lastPage() > 1)
<div class="ui pagination menu">
    <a href="{{ $galleries->previousPageUrl() }}" class="{{ ($galleries->currentPage() == 1) ? ' disabled' : '' }} item">
        Previous
    </a> @for ($i = 1; $i <=$galleries->lastPage(); $i++)
    <a href="{{ $galleries->url($i) }}" class="{{ ($galleries->currentPage() == $i) ? ' active' : '' }} item">
            {{ $i }}
        </a> @endfor
    <a href="{{ $galleries->nextPageUrl() }}" class="{{ ($galleries->currentPage() == $galleries->lastPage()) ? ' disabled' : '' }} item">
        Next
    </a>
</div>
@endif
<div class="ui divider horizontal end-page">Akhir page Galeri</div>
<script>
    $(document).ready(function(){
        $('a.img-link').venobox({
            framewidth: '100%',
            // frameheight: '300px'
        });
    });
</script>
@endsection