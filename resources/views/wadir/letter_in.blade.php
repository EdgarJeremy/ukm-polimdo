@extends('wadir._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Edaran Masuk
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Judul Edaran..." value={{Input::get('q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
        </form>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Judul Edaran</th>
                    <th>Pembuat</th>
                    <th>Privasi</th>
                    <th>Lampiran</th>
                    <th>Tanggal Dikirim</th>
                </tr>
            </thead>
            <tbody>
                @if(count($letters) > 0)
                @foreach($letters as $key=>$letter)
                <tr>
                    <td>{{$letter->name}}</td>
                    <td>{{$letter->user->name}}</td>
                    <td>
                        @if($letter->visibility->type === 1)
                        Publik (Semua Orang)
                        @else
                        Hanya ke :
                            <ul>
                            @foreach($letter->visibility_users as $visibility_user)
                                <li>{{$visibility_user->user->name}}</li>
                            @endforeach
                            </ul>
                        @endif
                    </td>
                    <td><a href="{{asset('/storage/letters/'.$letter->file)}}" target="_blank" class="ui button">Lihat Lampiran</a></td>
                    <td>{{$letter->created_at}}</td>
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
                        @if ($letters->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $letters->previousPageUrl() }}" class="{{ ($letters->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <= $letters->lastPage(); $i++)
                                <a href="{{ $letters->url($i) }}" class="{{ ($letters->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $letters->nextPageUrl() }}" class="{{ ($letters->currentPage() == $letters->lastPage()) ? ' disabled' : '' }} item">
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
<script>
    $(document).ready(function(){
        $('#users').hide();
        $('#addBtn').on('click', function(){
            $('.ui.modal.add').modal('show');
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
        $('#c').on('change', function(){
            if(this.checked) {
                $('#users').show();
                $('#users .dropdown').removeClass('disabled');
                $('#users select').prop('disabled', false);
            } else {
                $('#users').hide();
                $('#users .dropdown').addClass('disabled');
                $('#users select').prop('disabled', true);
            }
        });
    });
</script>
@endsection