@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
  <div class="ui basic segment">
    <h2 class="ui header">
      Welcome to English Club!
      </h1>
      <span>A simple example of creating a blog with Semanti-UI.</span>
  </div>
</div>

<div class="row" id="article">
  <div class="four wide left floated column">
    <div class="ui segment">
      <h3 class="ui header">
        Pengumuman
      </h3>
      <hr />
      <p>
        <b>#1</b> Etiam porta <i>sem malesuada magna mollis euismod</i>. Cras mattis consectetur purus sit amet fermentum.
        Aenean lacinia bibendum nulla sed consectetur.
      </p>
      <hr />
      <p>
        <b>#2</b> Etiam porta <i>sem malesuada magna mollis euismod</i>. Cras mattis consectetur purus sit amet fermentum.
        Aenean lacinia bibendum nulla sed consectetur.
      </p>
      <hr />
    </div>
  </div>
  <div class="eleven wide column">

    @for($i = 0; $i
    < 5; $i++) <h1 class="ui header">
      Sample blog post
      </h1>
      <span>March 6, 2017 by <a href="blog.html">Jack</a></span>
      <div class="ui hidden divider"></div>
      <p>
        This blog post shows a few different types of content that's supported and styled with Semantic-UI. Basic typesetting, list,
        and code are all supported..[<a href="#">Lebih lanjut</a>]
      </p>
      <div class="ui divider"></div>
      @endfor

      <div class="ui basic segment">
        <div class="ui basic circular huge button">
          <a href="blog.html#">Previous</a>
        </div>
        <div class="ui basic circular huge button">
          <a href="blog.html#">Next</a>
        </div>
      </div>
  </div>
</div>
<div class="ui divider horizontal end-page">Akhir page Home</div>
@endsection