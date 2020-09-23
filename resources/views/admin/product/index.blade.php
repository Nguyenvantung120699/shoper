@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Products Data</h4>
                <a href="{{url("admin/product/create")}}"><button class="btn btn-success"> Create Product </button></a>
                </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Products Name</th>
                            <th>Thumbnail</th>
                            <th>Brands</th>
                            <th>Categories</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Is Active</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->product_name}}</td>
                            <td>
                                <img src="{{asset($c->thumbnail)}}" style="width:100px;"/>
                            </td>
                            <td>{{$c->brand->brands_name}}</td>
                            <td>{{$c->category->categories_name}}</td>
                            <td>{{$c->price}}</td>
                            <td>{{$c->quantity}}</td>
                            @if($c->is_active == 1)
                                <td><label class="badge badge-success">On</label></td>
                            @else
                                <td><label class="badge badge-danger">Off</label></td>
                            @endif
                            <td>
                                <a href="{{url("admin/product/edit",['id'=>$c->id])}}"><label class="badge badge-info">Edit</label></a>
                                <a href="{{url("admin/product/delete",['id'=>$c->id])}}"><label class="badge badge-warning">Delete</label></a>
                                 <a href="{{url("admin/product/detail",['id'=>$c->id])}}"><label class="badge badge-success">Detail</label></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection