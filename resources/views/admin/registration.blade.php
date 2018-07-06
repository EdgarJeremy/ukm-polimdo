@extends('admin._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Anggota yang mendaftar
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="Nama anggota..." value={{Input::get( 'q')}}>
                <button type="submit" class="ui button">Cari</button>
            </div>
            <hr />
        </form>
        <form action="{{route('admin-set_registration')}}" method="post">
            {{csrf_field()}}
            <div class="ui slider checkbox">
                <input id="c" type="checkbox" name="pendaftaran" {{Auth::user()->ukm->registration ? "checked" : ""}}/>
                <label for="c">Buka Pendaftaran</label>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="ui button">Simpan</button>
        </form>
        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Angkatan</th>
                    <th>No. Telefon</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                    <th>Program Studi</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @if(count($members) > 0) @foreach($members as $key=>$member)
                <tr>
                    <td>{{$member->full_name}}</td>
                    <td>{{$member->nim}}</td>
                    <td>{{$member->semester}}</td>
                    <td>{{$member->generation}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->address}}</td>
                    <td>{{$member->major->name}}</td>
                    <td>{{$member->study_program->name}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a data-data="{{$member}}" href="#" class="ui button see">
                                <i class="eye icon"></i>
                            </a>
                        </div>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-registration_approve', ['id' => $member->id])}}" class="ui button">
                                <i class="check icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="9" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="9">
                        @if ($members->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $members->previousPageUrl() }}" class="{{ ($members->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <=$members->lastPage(); $i++)
                                <a href="{{ $members->url($i) }}" class="{{ ($members->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $members->nextPageUrl() }}" class="{{ ($members->currentPage() == $members->lastPage()) ? ' disabled' : '' }} item">
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
<div class="ui modal detail">
    <div class="header"></div>
    <div class="content">
        <b>Hobi</b>
        <p id="hobi"></p>
        <b>Alasan Bergabung</b>
        <p id="alasan"></p>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.see').on('click', function(){
            var data = $(this).data('data');
            $('.detail #hobi').text(data.hobbies);
            $('.detail #alasan').text(data.reason);
            $('.detail .header').text(data.full_name);
            console.log(data);
            $('.ui.modal.detail').modal('show');
        });
    });
</script>
@endsection