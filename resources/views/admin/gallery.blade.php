@extends('admin._root');
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Galeri
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Judul File..." value={{Input::get( 'q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
            <!-- Errors -->
            @if(count($errors->all()) > 0)
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                @foreach($errors->all() as $message)
                <p>{{$message}}</p>
                @endforeach
            </div>
            @endif

            <!-- Success -->
            @if(session('status') === true)
            <div class="ui success message">
                <div class="header">Data tersimpan!</div>
                <p>File berhasil diupload</p>
            </div>
            @endif
        </form>
        <button id="addBtn" class="ui labeled icon green button">
            <i class="plus icon"></i>
            Upload Baru
        </button>
        <div class="container">
            <hr />
            <div class="ui fluid six column doubling stackable masonry grid" id="gallery_list">
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
                        <hr />
                        <p><i class="align left icon"></i> Judul : {{$gallery->name}}</p>
                        <p><i class="calendar alternate icon"></i> Diupload : {{$gallery->created_at}}</p>
                    </div>
                </div>
                @endforeach
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
</div>
<div class="ui modal add">
    <div class="header">File Baru</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="field">
                <label>Nama File</label>
                <input type="text" name="name" placeholder="Nama File" required>
            </div>
            <div class="field">
                <label>Nominal Awal</label>
                <input type="file" name="file_file" required>
            </div>
            <button type="submit" class="ui green approve button" id="saveBtn">Simpan</button>
            <button type="button" class="ui red cancel button">Batal</button>
        </form>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#addBtn').on('click', function(){
            $('.ui.modal.add').modal('show');
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
    });
</script>
@endsection