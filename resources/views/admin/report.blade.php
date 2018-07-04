@extends('admin._root') 
@section('content')

<div class="ui grid">
    <div class="row">
        <h1 class="ui huge header">
            Laporan Keuangan
        </h1>
    </div>
    <div class="ui divider"></div>
    <div class="row">
        <form class="ui form">
            <div class="fields">
                <div class="field">
                    <label>Dari tanggal</label>
                    <input type="date" name="start" value="{{Request::get('start') ? Request::get('start') : date('Y-m-01')}}" />
                </div>
                <div class="field">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="end" value="{{Request::get('end') ? Request::get('end') : date('Y-m-t')}}" />
                </div>
            </div>
            <button type="submit" class="ui button blue">Terapkan</button>
        </form>
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Tipe Transaksi</th>
                    <th>Nilai Transaksi</th>
                    <th>Kas Target</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                    <th>Lampiran</th>
                    <th>Dari Kas (Transfer)</th>
                    <th>Ke Kas (Transfer)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{($transaction->type === 'in' ? 'Masuk' : (
                        $transaction->type === 'out' ? 'Keluar' : (
                            $transaction->type === 'transfer' ? 'Transfer' : ''
                        )
                    ))}}</td>
                    <td class="{{
                        $transaction->type === 'in' ? 'positive' : (
                        $transaction->type === 'out' ? 'negative' : (
                        $transaction->type === 'transfer' ? 'warning' : ''))
                    }}">
                        <b>
                        {{($transaction->type === 'in' ? '+' : (
                            $transaction->type === 'out' ? '-' : (
                                $transaction->type === 'transfer' ? '•' : ''
                            )
                        ))}} 
                        {{$transaction->cash}}
                        </b>
                    </td>
                    <td>
                        @if($transaction->type === 'in' || $transaction->type === 'out')
                        {{$transaction->target_cash->name}}
                        @else
                        -
                        @endif
                    </td>
                    <td>{{$transaction->action_date}}</td>
                    <td>{{$transaction->description}}</td>
                    <td><a target="_blank" href="{{asset('/storage/transactions/'.$transaction->file)}}">Lihat lampiran</a></td>
                    <td>
                        @if($transaction->type === 'transfer')
                        {{$transaction->transfer_from->name}}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($transaction->type === 'transfer')
                        {{$transaction->transfer_to->name}}
                        @else
                        -
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8">
                        @if ($transactions->lastPage() > 1)
                        <div class="ui pagination menu">
                            <a href="{{ $transactions->previousPageUrl() }}" class="{{ ($transactions->currentPage() == 1) ? ' disabled' : '' }} item">
                                    Previous
                                </a> @for ($i = 1; $i <=$transactions->lastPage(); $i++)
                                <a href="{{ $transactions->url($i) }}" class="{{ ($transactions->currentPage() == $i) ? ' active' : '' }} item">
                                        {{ $i }}
                                    </a> @endfor
                                <a href="{{ $transactions->nextPageUrl() }}" class="{{ ($transactions->currentPage() == $transactions->lastPage()) ? ' disabled' : '' }} item">
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