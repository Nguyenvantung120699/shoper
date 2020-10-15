<!DOCTYPE html>
<html lang="zxx">
    @include('layouts.html.head')
<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <!-- <div class="tip"></div> -->
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{url("/home")}}"><img src="{{asset("client/img/logo.png")}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        @if(!Auth::check())
        <div class="offcanvas__auth">
            <a href="{{url("/login")}}">Login</a>
            <a href="{{url("/register")}}">Register</a>
        </div>
        @else
        <div class="offcanvas__auth">
          <a href="#">Xin Chào ! {{Auth::user()->name}}</a>
          <a href="{{url("/logout")}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
        @endif
    </div>

    @include('layouts.html.header')

        @yield('content')

    @include('layouts.html.footer')

    @include('client.modal.login')
    <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch">+</div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Search here.....">
          </form>
      </div>
    </div>
  @include('layouts.html.script')
    @yield('js')
  </body>
</html>