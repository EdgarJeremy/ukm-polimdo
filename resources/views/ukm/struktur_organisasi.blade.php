@extends('ukm._root') 
@section('content')

<div class="row" id="page-header">
    <div class="ui basic segment">
        <h2 class="ui header">
            Struktur Organisasi
            </h1>
            <span>A simple example of creating a blog with Semanti-UI.</span>
    </div>
</div>

<div class="row" id="article">
    <div class="column">
        <div id="struktur"></div>
    </div>
</div>

<div class="ui divider horizontal end-page">Akhir page Struktur Organisasi</div>

<script>
    $(document).ready(function(){
        var chart_config = {
            chart: {
                container: "#struktur"
            },
            
            nodeStructure: {
                text: { name: "Ketua UKM" },
                children: [
                    {
                        text: { name: "Sekretaris" },
                        children: [
                            {
                                text: { name: "Wakil Sekretaris" }
                            }
                        ]
                    },
                    {
                        text: { name: "Bendahara" }
                    }
                ]
            }
        };

        var chart = new Treant(chart_config);
    });

</script>
@endsection