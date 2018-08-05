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
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @if(count($users) > 0)
                @foreach($users as $key=>$user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->type}}</td>
                    <td>
                        <div class="ui icon buttons actions-btn">
                            <a href="#" data-user="{{$user}}" class="ui button edit-btn">
                                <i class="edit icon"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="row-no-data">Belum ada data</td>
                </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4s">
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


<div class="ui modal add">
    <div class="header">Edit data pengurus</div>
    <div class="content">

        <form class="ui form" id="addForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value=""/>
            <div class="field">
                <label>E-Mail</label>
                <input type="text" name="email" placeholder="email" autocomplete="off" required/>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" autocomplete="off" placeholder="kosongkan jika tak ingin merubah" />
            </div>
            <hr />
            <button type="submit" class="ui green approve button" id="saveBtn">Simpan</button>
            <button type="button" class="ui red cancel button">Batal</button>
        </form>

    </div>
</div>

<script>
    $(document).ready(function(){
        $('.edit-btn').on('click', function(e){
            var userdata = $(this).data().user;
            $('.ui.modal form input[name="id"]').val(userdata.id);
            $('.ui.modal form input[name="email"]').val(userdata.email);
            console.log(userdata);
            $('.ui.modal.add').modal('show');
            e.preventDefault();
            return false;
        });
        $('.cancel').on('click', function(){
            $('.ui.modal.add').modal('hide');
        });
    });
</script>

@endsection