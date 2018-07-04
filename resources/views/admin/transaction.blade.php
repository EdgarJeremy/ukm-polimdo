@extends('admin._root')
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Transaksi
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form method="post" class="ui form fluid error success" enctype="multipart/form-data">
            {{csrf_field()}}

            <!-- Errors -->
            @if(count($errors->all()))
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <ul>
                @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <!-- Success -->
            @if(session('status') === true)
            <div class="ui success message">
                <div class="header">Data tersimpan!</div>
                <p>Data transaksi berhasil disimpan</p>
            </div>
            @elseif(session('status') === false)
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>Data transaksi gagal disimpan</p>
            </div>
            @elseif(session('status') === 'invalid_cash')
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>Nominal melebihi jumlah uang dalam kas</p>
            </div>
            @elseif(session('status') === 'invalid_target')
            <div class="ui error message">
                <div class="header">Terjadi kesalahan!</div>
                <p>Transfer tidak bisa dilakukan ke kas yang sama</p>
            </div>
            @endif

            <div class="field required">
                <label>Jenis Transaksi</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="type" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Jenis Transaksi</div>
                    <div class="menu">
                        <div class="item" data-value="in">Uang Masuk</div>
                        <div class="item" data-value="out">Uang Keluar</div>
                        <div class="item" data-value="transfer">Transfer</div>
                    </div>
                </div>
            </div>
            <div class="field required" id="target_cash">
                <label>Dari/Ke Kas</label>
                <div class="ui disabled selection dropdown">
                    <input type="hidden" name="cash_id" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Kas</div>
                    <div class="menu">
                        @foreach($cashes as $cash)
                        <div class="item" data-value="{{$cash->id}}">{{$cash->name}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="field required">
                <label>Nominal Transaksi</label>
                <input type="number" name="cash" placeholder="Nominal" required>
            </div>
            <div class="field required">
                <label>Tanggal</label>
                <input type="date" name="action_date" required>
            </div>
            <div class="field required">
                <label>Keterangan</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field required">
                <label>Lampiran</label>
                <input type="file" name="file_file">
            </div>
            <div class="field required" id="from_cash">
                <label>Transfer Dari</label>
                <div class="ui disabled selection dropdown">
                    <input type="hidden" name="cash_id_from" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Kas</div>
                    <div class="menu">
                        @foreach($cashes as $cash)
                        <div class="item" data-value="{{$cash->id}}">{{$cash->name}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="field required" id="to_cash">
                <label>Transfer Ke</label>
                <div class="ui disabled selection dropdown">
                    <input type="hidden" name="cash_id_to" required>
                    <i class="dropdown icon"></i>
                    <div class="default text">Kas</div>
                    <div class="menu">
                        @foreach($cashes as $cash)
                        <div class="item" data-value="{{$cash->id}}">{{$cash->name}}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button class="ui button">Simpan</button>
        </form>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#target_cash, #from_cash, #to_cash').hide();
        $('#target_cash .selection, #from_cash .selection, #to_cash .selection').addClass('disabled');

        $('input[name="type"]').on('change', function(){
            var val = $(this).val();
            if(val === 'in') {
                $('#target_cash').show();
                $('#target_cash label').text('Ke Kas');
                $('#target_cash .selection').removeClass('disabled');
                $('#from_cash, #to_cash').hide();
                $('#from_cash .selection, #to_cash .selection').addClass('disabled');
            } else if(val === 'out') {
                $('#target_cash').show();
                $('#target_cash label').text('Dari Kas');
                $('#target_cash .selection').removeClass('disabled');
                $('#from_cash, #to_cash').hide();
                $('#from_cash .selection, #to_cash .selection').addClass('disabled');
            } else if(val === 'transfer') {
                $('#target_cash').hide();
                $('#target_cash .selection').addClass('disabled');
                $('#from_cash, #to_cash').show();
                $('#from_cash .selection, #to_cash .selection').removeClass('disabled');
            }
        });
    });
</script>

@endsection