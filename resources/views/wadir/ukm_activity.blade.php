@extends('wadir._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Kegiatan
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama Kegiatan..." value={{Input::get( 'q')}}>
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
                <p>Kegiatan berhasil disimpan</p>
            </div>
            @elseif(session('status') === 'delete')
            <div class="ui success message">
                <div class="header">Kegiatan berhasil dihapus</div>
                <p>Data kegiatan berhasil dihapus dari sistem</p>
            </div>
            @endif
            <hr />
        </form>

        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>UKM</th>
                    <th>Nama Kegiatan</th>
                    <th>Status Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Waktu Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @if(count($activities) > 0) @foreach($activities as $key=>$activity)
                <tr>
                    <td><b>{{$activity->ukm->name}}</b></td>
                    <td>{{$activity->name}}</td>
                    <td>{{$activity->status}}</td>
                    <td>{{$activity->implementation_date}}</td>
                    <td>{{$activity->created_at}}</td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="5" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">
                        @if ($activities->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $activities->previousPageUrl() }}" class="{{ ($activities->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <=$activities->lastPage(); $i++)
                                <a href="{{ $activities->url($i) }}" class="{{ ($activities->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $activities->nextPageUrl() }}" class="{{ ($activities->currentPage() == $activities->lastPage()) ? ' disabled' : '' }} item">
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