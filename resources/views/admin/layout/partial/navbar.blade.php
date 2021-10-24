<header class="">
  <div class="container">
      <div class="d-flex align-items-center justify-content-between">
          <div class="open_menu" id="open_menu">
              <div class="line">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
          </div>
          <div class="notifications d-flex align-items-center ">
              <a href="{{url('admin/notifications')}}" class="notifications_icons">
                  <i class="fas fa-bell"></i>
                  <span>{{auth('admin')->user()->unreadNotifications->count()}}</span>
              </a>
              <div class="position-relative">
                  <div class="main-nav setting"><i class="fas fa-cog"></i></div>
                  <ul class="open_ul setting_drob">
                      <li><a href="{{url('admin/settings')}}">{{__('site.settings')}}</a></li>
                      <li><a href="{{url('admin/logout')}}">{{__('site.logout')}}</a></li>
                  </ul>
              </div>
              <div class="user">
                  <img src="{{auth('admin')->user()->avatar}}" alt="">
                  <span></span>
              </div>
          </div>
      </div>
  </div>
</header>