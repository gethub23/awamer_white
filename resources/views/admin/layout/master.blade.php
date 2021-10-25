@include('admin.layout.partial.header')
@include('admin.layout.partial.sidebar')
<div class="expander" id="main">
    @include('admin.layout.partial.navbar')
    <div class="main_body padding_section">
        <div class="container">
            <div class="box_tabs">
                <div class="name_tabl">
                    <h2>{{awtTrans(\Request::route()->getAction()['title'])}}</h2>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('admin.layout.partial.footer')