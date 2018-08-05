@include('super._head')

@include('super._header')

<div class="ui grid">
    <div class="row">
        <!-- Sidebar part -->
        @include('super._sidebar')
        <!-- Content part -->
        <div class="column" id="content">
            {{-- <div class="card"> --}}
                @yield('content')
            {{-- </div> --}}
        </div>
    </div>
</div>

@include('super._foot')

@include('super._footer')