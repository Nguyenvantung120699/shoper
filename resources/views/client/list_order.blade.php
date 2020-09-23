@extends('layouts.clientLayout')

@section('content')
<!-- Breadcrumb Begin -->
    @if($order->count() == 0)
    <section class="shop-cart spad">
        <div class="container">
            <div class="col-lg-4 offset-lg-4">
                <div class="cart__total__procced">
                    <h6>Bạn Chưa Có Đơn Nào</h6>
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
                        <span>Đơn Hàng Của Tôi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $c)
                                <tr>
                                    @foreach(\App\Models\OrderProduct::where("order_id",$c->id)->get() as $p)
                                        @foreach(\App\Models\Product::where("id",$p->product_id)->get() as $pr)
                                            <td class="cart__product__item">
                                                     @if($c->status==0)
                                                        <b style="color:Red">Chưa Xác Nhận</b>
                                                    @elseif($c->status==1)
                                                        <b style="color:Yellow">Đã Xác Nhận</b>
                                                    @elseif($c->status==2)
                                                        <b style="color:Blue">Đang Chuẩn Bị</b>
                                                    @elseif($c->status==3)
                                                        <b style="color:Purple">Đã Giao Cho Đơn Vị Vận Chuyển</b>
                                                    @elseif($c->status==4)
                                                        <b style="color:Orange">Đang Vận Chuyển</b>
                                                    @elseif($c->status==5)
                                                        <b style="color:Green">Đã Giao</b>
                                                    @else
                                                        <b style="color:Black">Đã Hủy</b>
                                                    @endif
                                                <img style="width:100px" src="{{asset($pr->thumbnail)}}" alt="">
                                                <div class="cart__product__item__title">
                                                    <span>Mã đơn: {{$c->id}}</span>
                                                    <h6>{{$pr->product_name}}</h6>
                                                    <div class="rating">
                                                        <p>Màu : {{$p->color}} , Kích thước : {{$p->size}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{$pr->getPrice()}} vnđ</td>
                                            <td class="cart__quantity">
                                                <b>{{$p->quantity}}</b>
                                            </td>
                                        @endforeach
                                    @endforeach
                                    <td class="cart__total">{{number_format($c->grand_total,0,',','.')}} vnđ</td>
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
                        <a href="#">Trang Trước</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span>Trang Sau</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Shop Cart Section End -->
    @endsection