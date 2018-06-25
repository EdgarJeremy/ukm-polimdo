@include('admin._head')

@include('admin._header')

<div class="ui grid">
    <div class="row">
        <!-- Sidebar part -->
        @include('admin._sidebar')
        <!-- Content part -->
        <div class="column" id="content">
            @yield('content')
        </div>
    </div>
</div>

@include('admin._foot')

@include('admin._footer')