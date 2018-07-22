@extends('admin._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Pengumuman
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama Rapat..." value={{Input::get( 'q')}}>
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
                <p>Pengumuman baru berhasil dibuat</p>
            </div>
            @elseif(session('status') === 'delete')
            <div class="ui success message">
                <div class="header">Pengumuman berhasil dihapus</div>
                <p>Data Pengumuman berhasil dihapus dari sistem</p>
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
                    <th>Nama Rapat</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Kontak Person</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($announcements) > 0) @foreach($announcements as $key=>$announcement)
                <tr>
                    <td>{{$announcement->name}}</td>
                    <td>{{$announcement->implementation_date}}</td>
                    <td>{{$announcement->place}}</td>
                    <td>{{$announcement->contact_person}}</td>
                    <td>{{$announcement->description}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-delete_announcement', ['id' => $announcement->id])}}" class="ui red button">
                                <i class="trash alternate icon"></i>
                            </a>
                        </div>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-set_publish_announcement', ['id' => $announcement->id, 'published' => $announcement->published ? 0 : 1])}}" class="ui {{$announcement->published ? 'orange' : 'green'}} button">
                                <i class="{{$announcement->published ? 'times' : 'check'}} circle icon"></i> {{$announcement->published ? 'Tarik' : 'Publikasi'}}
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="6" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">
                        @if ($announcements->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $announcements->previousPageUrl() }}" class="{{ ($announcements->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <=$announcements->lastPage(); $i++)
                                <a href="{{ $announcements->url($i) }}" class="{{ ($announcements->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $announcements->nextPageUrl() }}" class="{{ ($announcements->currentPage() == $announcements->lastPage()) ? ' disabled' : '' }} item">
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
<div class="ui modal add">
    <div class="header">Tambah Pengumuman</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="field">
                <label>Nama Rapat</label>
                <input type="text" name="name" placeholder="Nama Rapat" required>
            </div>
            <div class="field">
                <label>Tanggal Rapat</label>
                <input type="date" name="date" required>
            </div>
            <div class="field">
                <label>Waktu Rapat</label>
                <input type="time" name="time" required>
            </div>
            <div class="field">
                <label>Tempat Rapat</label>
                <input type="text" name="place" placeholder="Tempat Rapat" required>
            </div>
            <div class="field">
                <label>Contact Person</label>
                <input type="text" name="contact_person" placeholder="Contact Person" required>
            </div>
            <div class="field">
                <label>File</label>
                <input type="file" name="file_file" required>
            </div>    
            <div class="field">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi" required></textarea>
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