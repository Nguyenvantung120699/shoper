@extends('layouts.clientLayout')

@section('content')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> Vui Lòng Nhập Đầy Đủ Thông Tin Thanh Toán Bên Dưới</h6>
                </div>
            </div>
            <form action="{{url("/create-order")}}" method="post" class="checkout__form">
                @csrf
                <div class="row">
                        <div class="col-lg-6">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="checkout__form__input">
                                    <p>Tên Khách Hàng <span>*</span></p>
                                    <input name="customer_name" type="text" placeholder="Họ Và Tên">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Địa Chỉ Nhận Hàng <span>*</span></p>
                                    <input name="shipping_address" type="text" placeholder="vui lòng nhập đầy đủ địa chỉ cụ thể, ví dụ : số 1 - đường abc - quận B ....">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Số Điện Thoại <span>*</span></p>
                                    <input name="telephone" type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Ghi Chú <span>*</span></p>
                                    <input name="customer_note" type="text">
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__order">
                                <h5>Đơn đặt hàng của bạn</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Sản Phẩm</span>
                                            <span class="top__text__right">Tổng Tiền</span>
                                        </li>
                                        @foreach($item as $c)
                                            @foreach(\App\Models\Product::where("id",$c->product_id)->get() as $p)
                                            <input name="cart_id[]" type="hidden" value="{{$c->id}}">
                                            <li>{{$p->product_name}} [ SL : {{$c->quantity}} x {{$p->getPrice()}} vnđ ]<span>{{number_format($c->total,0,',','.')}} vnđ</span></li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Tạm Tính<span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                        <li>Tổng Thanh Toán <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                                        <input name="grand_total" type="hidden" value="{{$total}}">
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <p>Phí vận chuyển (< 50.000 vnđ) sẽ được tính khi giao hàng. vui lòng xác nhận phương thức thanh toán của bạn bên dưới</p>
                                    <label for="check-payment">
                                        Thanh Toán Khi Nhận Hàng
                                        <input name="payment_method" type="checkbox" value="Thanh Toán Khi Nhận Hàng" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input name="payment_method" type="checkbox" value="paypal" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Đặt Hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->
@endsection