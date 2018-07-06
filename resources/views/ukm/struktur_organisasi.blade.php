@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Struktur Organisasi
            </h1>
            <span>Susunan Organisasi UKM {{$ukm->name}}</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        @if($ukm->organization_chart)
        <img src="{{asset('/storage/organization_charts/'.$ukm->organization_chart)}}">
        @else
        <h3>Belum ada data</h3>
        @endif
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page Struktur Organisasi</div>

<script>
    // $(document).ready(function(){
    //     var chart_config = {
    //         chart: {
    //             container: "#struktur"
    //         },
            
    //         nodeStructure: {
    //             text: { name: "Ketua UKM" },
    //             children: [
    //                 {
    //                     text: { name: "Sekretaris" },
    //                     children: [
    //                         {
    //                             text: { name: "Wakil Sekretaris" }
    //                         }
    //                     ]
    //                 },
    //                 {
    //                     text: { name: "Bendahara" }
    //                 }
    //             ]
    //         }
    //     };

    //     var chart = new Treant(chart_config);
    // });

</script>
@endsection