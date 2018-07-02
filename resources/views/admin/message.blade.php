@extends('admin._root') 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Pesan Masuk
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        @if(session('deleted'))
        <div class="ui success message">
            <i class="close icon"></i>
            <div class="">
                Pesan berhasil dihapus
            </div>
        </div>
        @endif
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="NIM..." value={{Input::get('q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
        </form>
        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Waktu</th>
                    <th>Isi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($messages) > 0)
                @foreach($messages as $key=>$message)
                <tr>
                    <td>{{$message->name}}</td>
                    <td>{{$message->nim}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{$message->phone}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>{{$message->message}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-delete_message', ['id' => $message->id])}}" class="ui button">
                                <i class="trash alternate icon"></i>
                            </a>
                            <a href="#" onclick="openContent(event, '{{$message->message}}')" class="ui button">
                                <i class="eye icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7">
                        @if ($messages->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $messages->previousPageUrl() }}" class="{{ ($messages->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <= $messages->lastPage(); $i++)
                                <a href="{{ $messages->url($i) }}" class="{{ ($messages->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $messages->nextPageUrl() }}" class="{{ ($messages->currentPage() == $messages->lastPage()) ? ' disabled' : '' }} item">
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
<div class="ui modal">
    <div class="header">Isi Pesan</div>
    <div class="content">
        <p id="message-popup"></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".ui.dropdown").dropdown();
    });

    function openContent(e, v) {
        $('#message-popup').text(v);
        $('.ui.modal').modal('show');
        e.preventDefault();
    }

</script>
@endsection