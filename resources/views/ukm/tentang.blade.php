@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Tentang English Club
        </h1>
        <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <h1>Profil UKM</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci quaerat nisi doloribus facere inventore rerum recusandae
            aliquid laborum hic neque libero ratione veniam, a illum harum optio numquam ad odit.</p>
    </div>
</div>

<div class="row">
    <div class="column">
        <h1>Logo</h1>
        <img src="{{asset('/images/templates/semantic-ui/avatar/nan.jpg')}}" class="img-tentang">
        <h3>Arti Logo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut tenetur explicabo dicta sit minima vero impedit amet
            commodi? Quod laboriosam est sint similique molestias! Magnam repellendus numquam iure cumque sequi?</p>
    </div>
</div>

<div class="row">
    <div class="column">
        <h1>Visi & Misi</h1>
        <h3>Visi</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut tenetur explicabo dicta sit minima vero impedit amet
            commodi? Quod laboriosam est sint similique molestias! Magnam repellendus numquam iure cumque sequi?</p>
        <h3>Misi</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam pariatur dicta provident! Assumenda fugiat hic blanditiis labore pariatur incidunt reprehenderit, eum quaerat id dolor unde, cupiditate deleniti soluta recusandae iure?</p>
    </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Tentang</div>
@endsection