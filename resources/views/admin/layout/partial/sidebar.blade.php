<div class="l-navbar show" id="navbar">
    <div class=".nav">
        <!-- Logo+Text -->
        <a href="{{url('admin/dashboard')}}" class="nav-logo-container">
            <img src="{{asset('storage/images/settings/logo.png')}}" alt="">
        </a>
        <!-- List -->
        <ul class="nav-list">
            {!! \App\Traits\SideBar::sidebar() !!}
        </ul>
    </div>
</div>