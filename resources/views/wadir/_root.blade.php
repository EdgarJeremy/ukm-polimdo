@include('wadir._head')

@include('wadir._header')

<div class="ui grid">
    <div class="row">
        <!-- Sidebar part -->
        @include('wadir._sidebar')
        <!-- Content part -->
        <div class="column" id="content">
            {{-- <div class="card"> --}}
                @yield('content')
            {{-- </div> --}}
        </div>
    </div>
</div>

@include('wadir._foot')

@include('wadir._footer')