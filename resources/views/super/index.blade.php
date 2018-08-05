@extends('super._root'); 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Dashboard
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <h3>Daftar pengurus</h3>
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama..." value={{Input::get('q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
        </form>
        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Tipe</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                @foreach($users as $key=>$user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">
                        @if ($users->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $users->previousPageUrl() }}" class="{{ ($users->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <a href="{{ $users->url($i) }}" class="{{ ($users->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $users->nextPageUrl() }}" class="{{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }} item">
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
@endsection