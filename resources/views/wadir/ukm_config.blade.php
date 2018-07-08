@extends('wadir._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Daftar UKM
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama UKM..." value={{Input::get( 'q')}}>
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
                <div class="header">UKM tersimpan!</div>
                <p>UKM berhasil tersimpan</p>
            </div>
            @elseif(is_string(session('status')))
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>{{session('status')}}</p>
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
                    <th>Nama UKM</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if(count($ukms) > 0) @foreach($ukms as $key=>$ukm)
                <tr>
                    <td>{{$ukm->name}}</td>
                    <td><a href="{{route('wadir-ukm_setactive', ['id' => $ukm->id, 'active' => $ukm->active ? 0 : 1])}}" class="ui {{$ukm->active ? 'yellow' : 'green'}} button">{{$ukm->active ? 'Non-Aktifkan' : 'Aktifkan'}}</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="1" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="ui modal add">
    <div class="header">Tambah UKM Baru</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post">
            {{csrf_field()}}
            <div class="field">
                <label>Nama UKM</label>
                <input type="text" name="ukm_name" placeholder="Nama UKM" required>
            </div>
            <div class="field">
                <label>Nama Admin</label>
                <input type="text" name="admin_name" placeholder="Nama Admin" required>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="field">
                <label>Ketik Uang Password</label>
                <input type="password" name="rpassword" placeholder="Ketik Uang Password" required>
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