@extends('layouts.clientLayout')

@section('content')
<section class="categories">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row">
                  @foreach($category as $c)
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <div class="categories__item set-bg" data-setbg="{{$c->logo}}">
                            <div class="categories__text">
                                <h4>{{$c->categories_name}}</h4>
                                <p>358 items</p>
                                <a href="#">Xem Ngay</a>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Tất Cả</li>
                    @foreach($brand as $b)
                      <li data-filter=".women">{{$b->brands_name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($product as $p)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{asset($p->thumbnail)}}">
                        <div class="label new">Mới</div>
                        <ul class="product__hover">
                            <li><a href="{{asset($p->thumbnail)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="{{url("product_single/{$p->id}")}}">{{$p->product_name}}</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">{{$p->getPrice()}}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{asset("client/img/banner/banner-1.jpg")}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                      @foreach($category as $b)
                        <div class="banner__item">  
                          <div class="banner__text">
                              <span>Bộ Sưu Tập</span>
                              <h1>{{$b->categories_name}}</h1>
                              <a href="#">Xem Ngay</a>
                          </div>
                        </div>
                       @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Bán Chạy</h4>
                    </div>
                    @foreach($product_purchases as $pp)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img style="width:100px;" src="{{$pp->thumbnail}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <a href="{{url("product_single/{$p->id}")}}"><h6>{{$pp->product_name}}</h6></a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{$pp->getPrice()}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Giá Rẻ</h4>
                    </div>
                    @foreach($product_price as $pp)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img style="width:100px;" src="{{$pp->thumbnail}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <a href="{{url("product_single/{$p->id}")}}"><h6>{{$pp->product_name}}</h6></a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{$pp->getPrice()}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Mới</h4>
                    </div>
                    @foreach($product_new as $pp)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img style="width:100px;" src="{{$pp->thumbnail}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <a href="{{url("product_single/{$p->id}")}}"><h6>{{$pp->product_name}}</h6></a>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{$pp->getPrice()}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{asset($brand_news->logo)}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Hạ Giá</span>
                        <h2>Thương Hiệu {{$brand_news->brands_name}}</h2>
                        <h5><span>Giảm</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection