@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chi Tiết Đơn Hàng {{$order->id}}</h4>
                <dl class="dl-horizontal">
                    <dd>
                       <b>Mã đơn : </b> {{$order->id}}
                    </dd>

                    <dd>
                       <b>Khách hàng : </b> {{$order->customer_name}}
                    </dd>

                    <dd>
                       <b>Điện Thoại : </b> {{$order->telephone}}
                    </dd>

                    <dd>
                       <b>Địa Chỉ Nhận hàng : </b> {{$order->shipping_address}}
                    </dd>

                    <dd>
                       <b>Tổng Tiền : </b> {{number_format($order->grand_total,0,',','.')}} vnđ
                    </dd>

                    <dd>
                       <b>Ngày Đặt : </b> {{$order->created_at}}
                    </dd>

                    <dd>
                        <b>Ghi chú : </b> {{$order->customer_note}}
                    </dd>

                    <dd>
                        <b>Trạng thái : </b> 
                            @if($order->status == 0)
                            <span style="color:red">Chưa xác nhận</span>
                            @elseif($order->status == 1)
                            <span style="color:blue">Đã xác nhận</span>
                            @elseif($order->status == 2)
                            <span style="color:orange">Đang chuẩn bị</span>
                            @elseif($order->status == 3)
                            <span style="color:yellow">Đã giao cho nhà vận chuyển</span>
                            @elseif($order->status == 4)
                            <span style="color:purple">Đang vận chuyển</span>
                            @elseif($order->status == 5)
                            <span style="color:green">Đã giao hàng</span>
                            @else
                            <span style="color:black">Đã hủy</span>
                            @endif
                    </dd>

                    <dd>
                            @if($order->status == 0)
                                <form action="{{url("admin/order-status/{$order->id}")}}" method="post">
                                @csrf
                                    <input name="status" type="hidden" value="1">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Xác Nhận Đơn Hàng</button>
                                </form>
                            @elseif($order->status == 1)
                                <form {{url("admin/order-status/{$order->id}")}} method="post">
                                @csrf
                                    <input name="status" type="hidden" value="2">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Chuẩn Bị Đơn Hàng</button>
                                </form>
                            @elseif($order->status == 2)
                                <form {{url("admin/order-status/{$order->id}")}} method="post">
                                @csrf
                                    <input name="status" type="hidden" value="3">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Giao Cho Nhà Vận Chuyển</button>
                                </form>
                            @elseif($order->status == 3)
                                <form {{url("admin/order-status/{$order->id}")}} method="post">
                                @csrf
                                    <input name="status" type="hidden" value="4">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Đang Vận Chuyển</button>
                                </form>
                            @elseif($order->status == 4)
                                <form {{url("admin/order-status/{$order->id}")}} method="post">
                                @csrf
                                    <input name="status" type="hidden" value="5">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Đã Giao Thành Công</button>
                                </form>
                            @elseif($order->status == 5)
                                <button type="submit" class="btn btn-gradient-primary mr-2">Đã Giao Thành Công</button>
                            @else
                                <button type="submit" class="btn btn-gradient-primary mr-2">Đơn Đã Hủy</button>
                            @endif
                        </dd>

                </dl>
            </div>
            <div class="card-body">
                <h4 class="card-title">Sản phẩm</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Sản phẩm </th>
                            <th> Màu </th>
                            <th> Size </th>
                            <th> Số lượng </th>
                            <th> Giá </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\OrderProduct::where("order_id",$order->id)->get() as $p)
                            @foreach(\App\Models\Product::where("id",$p->product_id)->get() as $pr)
                                <tr>
                                    <td class="py-1">
                                    <img style="width:100px;height:100px" src="{{asset($pr->thumbnail)}}" alt="image">
                                    {{$pr->product_name}}
                                    </td>
                                    <td> {{$p->color}} </td>
                                    <td>
                                        {{$p->size}}
                                    </td>
                                    <td> {{$p->quantity}} </td>
                                    <td> {{$pr->getPrice()}} </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection