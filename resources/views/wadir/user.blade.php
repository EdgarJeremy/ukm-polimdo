@extends('wadir._root')
@section('content')

<div class="ui grid">

    <div class="row">
        <h1 class="ui huge header">
            Pengaturan Pengguna
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        
        <form class="ui form fluid success error" method="post">
            {{csrf_field()}}

            <!-- Errors -->
            @foreach($errors->all() as $message)
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>{{$message}}</p>
            </div>
            @endforeach
            <!-- Success & Failed -->
            @if(session('status') !== null)
                @if(session('status') === true)
                <div class="ui success message">
                    <div class="header">Data tersimpan!</div>
                    <p>Data pengguna berhasil disimpan</p>
                </div>
                @else
                <div class="ui error message">
                    <div class="header">Terjadi kesalahan</div>
                    <p>{{session('status')}}</p>
                </div>
                @endif
            @endif
            <div class="field">
                <label>Nama Pengguna</label>
                <input type="text" name="name" placeholder="Nama Pengguna" value="{{Auth::user()->name}}" required>
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="E-Mail" value="{{Auth::user()->email}}" required>
            </div>
            <div class="field">
                <label>Password Sekarang</label>
                <input type="password" name="current_password" placeholder="Password Sekarang" required>
            </div>
            <hr />
            <div class="ui toggle checkbox">
                <input type="checkbox" name="change_password" id="change_password" />
                <label for="change_password">Rubah password</label>
            </div><br /><br />
            <div class="field">
                <label>Password Baru</label>
                <input disabled type="password" name="password" placeholder="Password Baru" required>
            </div>
            <div class="field">
                <label>Konfirmasi Password Baru</label>
                <input disabled type="password" name="confirm_password" placeholder="Konfirmasi Password Baru" required>
            </div>
            <hr />
            <button class="ui button" type="submit">Simpan</button>
        </form>

    </div>

</div>

<script>
    $(document).ready(function(){
        $('#change_password').on('change', function(){
            $('input[name="password"], input[name="confirm_password"]').prop('disabled', !this.checked);
        });
    });
</script>

@endsection