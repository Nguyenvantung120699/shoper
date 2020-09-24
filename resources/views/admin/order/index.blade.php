@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh Sách Đơn Hàng</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Tên Khách Hàng </th>
                            <th> Điện Thoại </th>
                            <th> Ngày Đặt </th>
                            <th> Tổng Tiền </th>
                            <th> Trạng Thái </th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($order as $o)
                          <tr>
                            <td>{{$o->id}}</td>
                            <td>{{$o->customer_name}}</td>
                            <td>{{$o->telephone}}</td>
                            <td>{{$o->created_at}}</td>
                            <td>{{number_format($o->grand_total,0,',','.')}} vnđ</td>
                            @if($o->status == 0)
                            <td style="color:red">Chưa xác nhận</td>
                            @elseif($o->status == 1)
                            <td style="color:blue">Đã xác nhận</td>
                            @elseif($o->status == 2)
                            <td style="color:orange">Đang chuẩn bị</td>
                            @elseif($o->status == 3)
                            <td style="color:yellow">Đã giao cho nhà vận chuyển</td>
                            @elseif($o->status == 4)
                            <td style="color:purple">Đang vận chuyển</td>
                            @elseif($o->status == 5)
                            <td style="color:green">Đã giao hàng</td>
                            @else
                            <td style="color:black">Đã hủy</td>
                            @endif
                            <td>
                              <a href="{{url("admin/order-detail/{$o->id}")}}"><label class="badge badge-primary">Xem chi tiết</label></a>
                            </td>
                          </tr>
                          @empty
                          <tr>
                          <td><h2>Chưa Có Đơn</h2></td>
                          </tr>
                          @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection