@extends('wadir._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Edaran Keluar
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Judul Edaran..." value={{Input::get('q')}}>
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
                <p>Edaran berhasil dibuat</p>
            </div>
            @endif
            <hr />
        </form>
        <button id="addBtn" class="ui labeled icon green button">
            <i class="plus icon"></i>
            Buat Edaran
        </button>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Judul Edaran</th>
                    <th>Privasi</th>
                    <th>Lampiran</th>
                    <th>Tanggal Dikirim</th>
                </tr>
            </thead>
            <tbody>
                @if(count($letters) > 0)
                @foreach($letters as $key=>$letter)
                <tr>
                    <td>{{$letter->name}}</td>
                    <td>
                        @if($letter->visibility->type === 1)
                        Publik (Semua Orang)
                        @else
                        Hanya ke :
                            <ul>
                            @foreach($letter->visibility_users as $visibility_user)
                                <li>{{$visibility_user->user->name}}</li>
                            @endforeach
                            </ul>
                        @endif
                    </td>
                    <td><a href="{{asset('/storage/letters/'.$letter->file)}}" target="_blank" class="ui button">Lihat Lampiran</a></td>
                    <td>{{$letter->created_at}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">
                        @if ($letters->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $letters->previousPageUrl() }}" class="{{ ($letters->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <= $letters->lastPage(); $i++)
                                <a href="{{ $letters->url($i) }}" class="{{ ($letters->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $letters->nextPageUrl() }}" class="{{ ($letters->currentPage() == $letters->lastPage()) ? ' disabled' : '' }} item">
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
    <div class="header">Buat Edaran Baru</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="field">
                <label>Nama Edaran</label>
                <input type="text" name="name" placeholder="Nama Edaran" required>
            </div>
            <div class="field">
                <label>Lampiran</label>
                <input type="file" name="file_file" required>
            </div>
            <div class="field">
                <label>Privasi</label>
                <div class="ui toggle checkbox">
                    <input id="c" type="checkbox" name="private">
                    <label for="c">Ke User Tertentu</label>
                </div><br /><br />
                <p>Aktifkan jika edaran hanya akan dikirim ke user tertentu. Non-aktifkan jika ingin akses edaran ke publik</p>
            </div>
            <div class="ui divider"></div>
            <div class="field" id="users">
                <label>Kirim Ke</label>
                <select disabled name="users[]" class="ui disabled fluid search dropdown" multiple="">
                    <option value="">Pilih Tujuan</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <hr />
            <button type="submit" class="ui green approve button" id="saveBtn">Simpan</button>
            <button type="button" class="ui red cancel button">Batal</button>
        </form>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#users').hide();
        $('#addBtn').on('click', function(){
            $('.ui.modal.add').modal('show');
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
        $('#c').on('change', function(){
            if(this.checked) {
                $('#users').show();
                $('#users .dropdown').removeClass('disabled');
                $('#users select').prop('disabled', false);
            } else {
                $('#users').hide();
                $('#users .dropdown').addClass('disabled');
                $('#users select').prop('disabled', true);
            }
        });
    });
</script>
@endsection