<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{url("/shoper")}}"><h2>Shopers</h2></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{url("/shoper")}}">Home</a></li>
                            <li><a href="{{url("/shop")}}">Cửa Hàng</a></li>
                            <li><a href="#">Thương Hiệu</a>
                                <ul class="dropdown">
                                    @foreach(\App\Models\Brand::all() as $b)   
                                    <li><a href="#">{{$b->brands_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>           
                            <li><a href="#">Danh Mục</a>
                                <ul class="dropdown">
                                    @foreach(\App\Models\Category::all() as $c)   
                                    <li><a href="#">{{$c->categories_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>                                
                            <li><a href="#">Tùy Chọn</a>
                                <ul class="dropdown">
                                    <li><a href="{{url("/list-order")}}">Đơn Của Tôi</a></li>
                                    <li><a href="{{url("/admin/index")}}">Admin</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.html">Giới Thiệu</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        @if(!Auth::check())
                        <div class="header__right__auth">
                            <a href="{{url("/login")}}">Login</a>
                            <a href="{{url("/regiter")}}">Register</a>
                        </div>
                        @else
                        <div class="header__right__auth">
                          <a href="#">Xin Chào ! {{Auth::user()->name}}</a>
                        </div>
                        @endif
                        <ul class="header__right__widget">
                            <li><a href="{{url("/logout")}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                            <li><span class="icon_search search-switch"></span></li>
                            @if(!Auth::check())
                            <li><a href="{{url("/login")}}"><span class="icon_bag_alt"></span>
                            @else
                            <li><a href="{{url("/cart")}}"><span class="icon_bag_alt"></span>
                            @endif
                                <!-- <div class="tip"></div> -->
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>