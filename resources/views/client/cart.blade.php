@extends('layouts.clientLayout')

@section('content')
<!-- Breadcrumb Begin -->
    @if($cart->count() == 0)
    <section class="shop-cart spad">
        <div class="container">
            <div class="col-lg-4 offset-lg-4">
                <div class="cart__total__procced">
                    <h6>Giỏ Hàng Của Bạn Trống</h6>
                    <a href="{{url("/shop")}}" class="primary-btn">Mua Ngay</a>
                </div>
            </div>
        </div>
    </section>
    @else
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <form action="{{url("/check_out")}}" method="post" class="checkout__form">
    @csrf
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $c)
                                <tr>
                                @foreach(\App\Models\Product::where("id",$c->product_id)->get() as $p)
                                    <td class="cart__price">
                                        <div class="checkout__form__checkbox">
                                            <label for="acc{{$c->id}}">
                                                <input name="cart_id[]" value="{{$c->id}}" type="checkbox" checked id="acc{{$c->id}}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="cart__product__item">
                                        <img style="width:100px" src="{{asset($p->thumbnail)}}" alt="">
                                        <div class="cart__product__item__title">
                                            <h6>{{$p->product_name}}</h6>
                                            <div class="rating">
                                                <p>Màu : {{$c->color}} , Kích thước : {{$c->size}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{$p->getPrice()}} vnđ</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$c->quantity}}">
                                        </div>
                                    </td>
                                    @endforeach
                                    <td class="cart__total">{{number_format($c->total,0,',','.')}} vnđ</td>
                                    <td class="cart__close"><a href="{{url("/delete-item-cart/{$c->id}")}}"><span class="icon_close"></span></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{url("/shop")}}">Tiếp Tục Mua</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{url("/clear-cart")}}"><span class="icon_loading"></span> Xóa Giỏ Hàng</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>TỔNG GIỎ HÀNG</h6>
                        <ul>
                            <li>Tạm Tính <span>{{number_format($cart->sum('total'),0,',','.')}} vnđ</span></li>
                            <li>Tổng Tiền <span>{{number_format($cart->sum('total'),0,',','.')}} vnđ</span></li>
                        </ul>
                        <button type="submit" class="site-btn"><span class="icon_bag_alt"></span> Kiểm Tra Đặt Hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    @endif
    <!-- Shop Cart Section End -->
    @endsection