@extends('admin._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Kegiatan
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama Kegiatan..." value={{Input::get( 'q')}}>
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
                <p>Kegiatan berhasil disimpan</p>
            </div>
            @elseif(session('status') === 'delete')
            <div class="ui success message">
                <div class="header">Kegiatan berhasil dihapus</div>
                <p>Data kegiatan berhasil dihapus dari sistem</p>
            </div>
            @endif
            <hr />
        </form>
        <button id="addBtn" class="ui labeled icon green button">
            <i class="plus icon"></i>
            Tambah
        </button>

        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama Kegiatan</th>
                    <th>Status Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Waktu Dibuat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($activities) > 0) @foreach($activities as $key=>$activity)
                <tr>
                    <td>{{$activity->name}}</td>
                    <td>{{$activity->status}}</td>
                    <td>{{$activity->implementation_date}}</td>
                    <td>{{$activity->created_at}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-delete_activity', ['id' => $activity->id])}}" class="ui red button">
                                <i class="trash alternate icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="5" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">
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
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="ui modal fullscreen add">
    <div class="header">Tambah Kegiatan</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="field">
                <label>Nama Kegiatan</label>
                <input type="text" name="name" placeholder="Nama Kegiatan" required>
            </div>
            <div class="field">
                <label>Status</label>
                <select name="status" class="ui dropdown">
                    <option value="">Status Kegiatan</option>
                    <option value="Belum Terlaksana">Belum Terlaksana</option>
                    <option value="Sudah Terlaksana">Sudah Terlaksana</option>
                </select>
            </div>
            <div class="field">
                <label>Gambar</label>
                <input type="file" name="file_file" required>
            </div>
            <div class="field">
                <label>Tanggal Kegiatan</label>
                <input type="date" name="date" required>
            </div>
            <div class="field">
                <label>Waktu Kegiatan</label>
                <input type="time" name="time" required>
            </div>
            <div class="field">
                <label>Konten</label>
                <textarea name="content" id="scontent" rows="10"></textarea>
            </div>
            <button type="submit" class="ui green approve button" id="saveBtn">Simpan</button>
            <button type="button" class="ui red cancel button">Batal</button>
        </form>

    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function(){
        $('#addBtn').on('click', function(){
            $('.ui.modal.add').modal('show');
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
        ClassicEditor
            .create( document.querySelector( '#scontent' ) )
            .catch(function() {
                console.error( error );
            });
    });
</script>
@endsection