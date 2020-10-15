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
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Danh sách đơn hàng</h4>
                        </div>

                        <ul class="list-group list-group-flush">
                            @foreach($order as $c)
                            <li class="list-group-item">
                                <div>
                                   <div class="col-md-12 row">
                                        <div class="col-md-11">
                                            <b>Mã đơn : #{{$c->id}}</b> - 
                                            @if($c->status==0)
                                                <label style="color:Red">Chưa Xác Nhận</label>
                                                <button type="button" class="btn btn-danger btn-sm">Hủy đơn</button>
                                            @elseif($c->status==1)
                                                <label style="color:Yellow">Đã Xác Nhận</label>
                                            @elseif($c->status==2)
                                                <label style="color:Blue">Đang Chuẩn Bị</label>
                                            @elseif($c->status==3)
                                                <label style="color:Purple">Đã Giao Cho Đơn Vị Vận Chuyển</label>
                                            @elseif($c->status==4)
                                                <label style="color:Orange">Đang Vận Chuyển</label>
                                            @elseif($c->status==5)
                                                <label style="color:Green">Đã Giao</label>
                                            @else
                                                <label style="color:Black">Đã Hủy</label>
                                            @endif
                                            <p>Đặt ngày : {{$c->created_at}} @if($c->status==5)| Đã giao ngày : {{$c->updated_at}} @endif</p>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="#">Quản Lý</a> 
                                        </div>
                                   </div>
                                   <div class="col-md-12">
                                        <b style="color:black">Sản phẩm :</b>
                                   </div>
                                    <div class="col-md-12 row">
                                    @foreach(\App\Models\OrderProduct::where("order_id",$c->id)->get() as $p)
                                        @foreach(\App\Models\Product::where("id",$p->product_id)->get() as $pr)
                                        <div class="col-md-4">
                                            <a href="#" class="blog__feature__item">
                                                @if($c->status==5)
                                                    <a href="#" data-toggle="modal" data-target="#feedback{{$p->product_id}}ModalCenter"><button type="button" class="btn btn-success btn-sm">Đánh Giá</button></a>
                                                @endif
                                                <div class="blog__feature__item__pic">
                                                    <img style="width:100px" src="{{asset($pr->thumbnail)}}" alt="">
                                                </div>
                                                <div class="blog__feature__item__text">
                                                    <h6>{{$pr->product_name}}</h6>
                                                    <p>Màu : {{$p->color}}, Kích Thước : {{$p->size}}</p>
                                                    <p>Số lượng : {{$p->quantity}} </p>
                                                </div>
                                            </a>
                                        </div>  
                                        @endforeach
                                    @endforeach 
                                </div>
                                </div>
                            </li>
                            @include('client.modal.feedback')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- Shop Cart Section End -->
    @endsection