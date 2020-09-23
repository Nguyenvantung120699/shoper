@extends('layouts.clientLayout')

@section('content')
<!-- Breadcrumb Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="col-lg-6 offset-lg-3">
                <div class="cart__total__procced text-center">
                    <h6>Đơn Hàng Của Bạn Đã Đặt Thành Công</h6>
                    <p>Vui Lòng Chờ Người Bán Xác Nhận Và Cập Nhật Thông Tin Đơn Hàng</p>
                    <p>Xin Cảm Ơn !</p>
                    <a href="{{url("/shop")}}" class="primary-btn">Tiếp Tục Mua</a>
                </div>
            </div>
        </div>
    </section>
@endsection