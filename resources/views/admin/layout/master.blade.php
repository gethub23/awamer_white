@include('admin.layout.partial.header')
@include('admin.layout.partial.sidebar')
<div class="expander" id="main">
    @include('admin.layout.partial.navbar')
    <div class="main_body padding_section">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
@include('admin.layout.partial.footer')