@extends('layouts.clientLayout')

@section('content')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url("/home")}}"><i class="fa fa-home"></i> Home</a>
                        <span>{{$product->product_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                            @php
                                $gallery = $product->gallery;
                                $gallery = explode(",",$gallery);// string -> array
                            @endphp
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#{{asset($product->thumbnail)}}">
                                  <img src="{{asset($product->thumbnail)}}" alt="">
                              </a>
                            @foreach($gallery as $g)   
                              <a class="pt" href="#{{asset($g)}}">
                                  <img src="{{asset($g)}}" alt="">
                              </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                    <img data-hash="{{asset($product->thumbnail)}}" class="product__big__img" src="{{asset($product->thumbnail)}}" alt="">
                                @foreach($gallery as $g)   
                                  <img data-hash="{{asset($g)}}" class="product__big__img" src="{{asset($g)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$product->product_name}} <span>Thương Hiệu: {{$product->brand->brands_name}}</span></h3>
                        <div class="rating">
                            <span>Danh Mục : {{$product->category->categories_name}}</span>
                        </div>
                        <div class="rating">
                            <span>Số Lượng : {{$product->quantity}}</span>
                        </div>
                        <div class="product__details__price">{{$product->getPrice()}} vnđ<span>{{$product->purchases}} lượt mua</span></div>
                        <p>{{$product->product_description}}</p>
                        <form action="{{url("shopping/{$product->id}")}}" method="post">
                        @csrf
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Số Lượng:</span>
                                <div class="pro-qty">
                                    <input name="quantity" type="text" value="1">
                                </div>
                            </div>
                            @if(!Auth::check())
								<a href="#" data-toggle="modal" data-target="#loginModalCenter">
                                    <button type="submit" class="site-btn"><span class="icon_bag_alt"></span> Thêm Vào Giỏ</button>
								</a>
							@else
                                <button type="submit" class="site-btn"><span class="icon_bag_alt"></span> Thêm Vào Giỏ</button>
							@endif
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Màu:</span>
                                    @php
                                        $color = $product->color;
                                        $color = explode(",",$color);// string -> array
                                    @endphp
                                    <div class="stock__checkbox">
                                        @foreach($color as $c)
                                            <label style="display: inline-block;margin-right: 10px;" for="stockin{{$c}}">
                                                {{$c}}
                                                <input type="radio" id="stockin{{$c}}" name="color" class="@error('color') is-invalid @enderror" value="{{$c}}">
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                        @error('color')
                                            <span class="invalid-feedback" role="alert">
                                                <span style="color:red;text-decoration: underline;">vui lòng chọn Màu</span>
                                            </span>
                                        @enderror
                                    </div>
                                </li>
                                <li>
                                    <span>Kích Thước:</span>
                                    @php
                                        $size = $product->size;
                                        $size = explode(",",$size);// string -> array
                                    @endphp
                                    <div class="size__btn">
                                        @foreach($size as $s)
                                        <label for="{{$s}}-btn" class="">
                                            <input type="radio" name="size" class="@error('size') is-invalid @enderror" value="{{$s}}" id="{{$s}}-btn">
                                            <b>{{$s}}</b>
                                        </label>
                                        @endforeach
                                        @error('size')
                                            <span class="invalid-feedback" role="alert">
                                                <span style="color:red;text-decoration: underline;">vui lòng chọn Size</span>
                                            </span>
                                        @enderror
                                    </div>
                                </li>
                            </ul>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Đánh Giá</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Giới Thiệu</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="blog__details__comment">
                                    <h5>{{$feedback->count()}} Nhận Xét</h5>
                                    <a href="#" class="leave-btn">Leave a comment</a>
                                    @foreach($feedback as $f)
                                    <div class="blog__comment__item">
                                        <div class="blog__comment__item__pic">
                                            <img src="{{asset("client/img/blog/details/comment-1.jpg")}}" alt="">
                                        </div>
                                        <div class="blog__comment__item__text">
                                            <h6>{{$f->Users->name}}</h6>
                                            <p>{{$f->feel}}</p>
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>{{$f->created_at}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-lg-12 text-center">
                                        <div class="pagination__option">
                                        @if($feedback->previousPageUrl() != null)
                                            <a href="{{$feedback->previousPageUrl()}}"><i class="fa fa-angle-left"></i></a>
                                            @else
                                        @endif
                                            @for ($i = 1; $i <= $feedback->lastPage(); $i++)
                                            <a href="{{$feedback->nextPageUrl()}}">{{$i}}</a>
                                            @endfor
                                        @if($feedback->nextPageUrl() != null)
                                            <a href="{{$feedback->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
                                            @else
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Giới Thiệu {{$product->product_name}}</h6>
                                <p>{{$product->product_description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Gợi Ý Cho Bạn</h5>
                    </div>
                </div>
                @foreach($category_product as $c)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset($c->thumbnail)}}">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{asset($c->thumbnail)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{url("/product_single/{$c->id}")}}">{{$c->product_name}}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">{{$c->getPrice()}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
@endsection