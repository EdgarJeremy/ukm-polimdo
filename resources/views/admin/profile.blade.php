@extends('admin._root') 
@section('content')

<div class="ui grid">

    <div class="row">
        <h1 class="ui huge header">
            Profil UKM {{$ukm->name}}
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="ui form fluid error" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @foreach($errors->all() as $message)
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>{{$message}}</p>
            </div>
            @endforeach
            <h4 class="ui dividing header">Informasi Dasar</h4>
            <div class="field">
                <label>Profil</label>
                <div class="field">
                    <textarea name="profile" required>{{$ukm->profile}}</textarea>
                </div>
            </div>
            <div class="field">
                <label>Logo</label>
                <div class="field">
                    <input type="file" name="logo_file">
                </div>
                <img class="logo-current" src="{{asset('/storage/logos/'.$ukm->logo)}}" alt="Logo">
            </div>
            <div class="field">
                <label>Arti Logo</label>
                <div class="field">
                    <input type="text" name="logo_meaning" value="{{$ukm->logo_meaning}}" required>
                </div>
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Visi</label>
                    <textarea name="vision">{{$ukm->vision}}</textarea>
                </div>
                <div class="field">
                    <label>Misi</label>
                    <textarea name="mission">{{$ukm->mission}}</textarea>
                </div>
            </div>
            <h4 class="ui dividing header">FAQ</h4>
            <div class="field">
                <input type="hidden" name="faqs" value='{{$ukm->faqs ? $ukm->faqs : '[{"q": "", "a": ""}]'}}' id="faqs-values" />
                <div id="root"></div>
            </div>
            <hr />
            <button type="submit" class="ui button" tabindex="0">Simpan Data</button>
        </form>
    </div>
</div>

<script src="{{asset('/js/components/faqs-inputs.js')}}"></script>

@endsection