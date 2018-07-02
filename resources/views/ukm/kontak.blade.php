@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Kontak Kami
            </h1>
            <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        @if(session('status'))
        <div class="ui success message">
            <i class="close icon"></i>
            <div class="">
                Pesan berhasil dikirim!
            </div>
        </div>
        @endif
        <form class="ui form" method="post">
            {{ csrf_field() }}
            <div class="field">
                <label>Nama</label>
                <input type="text" name="name" required />
            </div>
            <div class="field">
                <label>NIM</label>
                <input type="number" name="nim" required />
            </div>
            <div class="field">
                <label>Email</label>
                <input type="email" name="email" required />
            </div>
            <div class="field">
                <label>Nomor Telefon</label>
                <input type="text" name="phone" required />
            </div>
            <div class="field">
                <label>Pesan</label>
                <textarea name="message" required></textarea>
            </div>
            <button type="submit" class="ui left labeled icon button">
                    <i class="save icon"></i>
                    Kirim
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="column">
        <div class="ui header">Follow kami di : &nbsp;&nbsp;&nbsp;</div>
        <button class="ui facebook button">
            <i class="facebook icon"></i>
            Facebook
        </button>
        <button class="ui instagram button">
            <i class="instagram icon"></i>
            Instagram
        </button>
        <button class="ui twitter button">
            <i class="twitter icon"></i>
            Twitter
        </button>
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page Kontak</div>
@endsection