@extends('admin._root') 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Kas UKM
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="fluid" action="">
            <div class="ui fluid action input">
                <input name="q" type="text" placeholder="NIM..." value={{Input::get( 'q')}}>
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
                <p>Kas baru berhasil dibuat</p>
            </div>
            @elseif(session('status') === 'delete')
            <div class="ui success message">
                <div class="header">Kas berhasil dihapus</div>
                <p>Data kas berhasil dihapus dari sistem</p>
            </div>
            @endif
            <hr />
        </form>
        <button id="addBtn" class="ui labeled icon green button">
            <i class="plus icon"></i>
            Tambah
        </button>

        <table class="ui celled table fixed single line">
            <thead>
                <tr>
                    <th>Nama Cash</th>
                    <th>Nominal Awal</th>
                    <th>Sisa Nominal</th>
                    <th>Deskripsi</th>
                    <th>Waktu Dibuat</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($cashes) > 0) @foreach($cashes as $key=>$cash)
                <tr>
                    <td>{{$cash->name}}</td>
                    <td>Rp. {{$cash->initial_balance}}</td>
                    <td>Rp. {{$cash->balance}}</td>
                    <td>{{$cash->description}}</td>
                    <td>{{$cash->created_at}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a href="{{route('admin-delete_cash', ['id' => $cash->id])}}" class="ui red button">
                                <i class="trash alternate icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach 
                @else
                <tr>
                    <td colspan="6" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="6">
                        @if ($cashes->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $cashes->previousPageUrl() }}" class="{{ ($cashes->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <=$cashes->lastPage(); $i++)
                                <a href="{{ $cashes->url($i) }}" class="{{ ($cashes->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $cashes->nextPageUrl() }}" class="{{ ($cashes->currentPage() == $cashes->lastPage()) ? ' disabled' : '' }} item">
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
<div class="ui modal add">
    <div class="header">Tambah Kas Baru</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post">
            {{csrf_field()}}
            <div class="field">
                <label>Nama Cash</label>
                <input type="text" name="name" placeholder="Nama Cash" required>
            </div>
            <div class="field">
                <label>Nominal Awal</label>
                <input type="number" name="initial_balance" placeholder="Nominal Awal" required>
            </div>
            <div class="field">
                <label>Deskripsi Kas</label>
                <textarea name="description" placeholder="Deskripsi" required></textarea>
            </div>
            <button type="submit" class="ui green approve button" id="saveBtn">Simpan</button>
            <button type="button" class="ui red cancel button">Batal</button>
        </form>

    </div>
</div>
<script>
    $(document).ready(function(){
        $('#addBtn').on('click', function(){
            $('.ui.modal.add').modal('show');
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
    });

</script>
@endsection