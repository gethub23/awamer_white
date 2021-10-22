@include('admin.layout.partial.header')

    @if(Route::currentRouteName() != 'admin.show.login')
        @include('admin.layout.partial.navbar')
    @endif

   <div class="app-content content">
       @if(Route::currentRouteName() != 'admin.show.login')
         <div class="content-wrapper">
                @yield('breadcrumb')
                @include('admin.layout.partial.sidebar')
                <div class="content-body">
        @endif
                @yield('content')
        @if(Route::currentRouteName() != 'admin.show.login')
                </div>
           </div>
        @endif
    </div>
@include('admin.layout.partial.footer')

  
