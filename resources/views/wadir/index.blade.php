@extends('wadir._root'); 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Dashboard
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <h3>Daftar Pengunjung</h3>
        <table class="ui very basic collapsing celled table fluid">
            <thead>
                <tr>
                    <th>Info</th>
                    <th>Klik</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visitors as $visitor)
                <tr>
                    <td>
                        <h4 class="ui image header">
                            <i class="{{strtolower($visitor->country)}} flag"></i>
                            <div class="content">
                                {{$visitor->ip}}
                                <div class="sub header">{{$visitor->created_at}}
                                </div>
                            </div>
                        </h4>
                    </td>
                    <td>
                        {{$visitor->clicks}}x
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection