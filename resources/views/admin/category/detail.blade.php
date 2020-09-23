@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Categories</h4>
                <div class="table-responsive">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Id :</b> {{$categories->id}}</li>
                        <li class="list-group-item"><b>Name :</b> {{$categories->categories_name}}</li>
                        <li class="list-group-item"><b>Logo :</b><img style="width:100px;" src="{{asset($categories->logo)}}" alt=""></li>
                        <li class="list-group-item"><b>Description :</b> {{$categories->description}}</li>
                        <li class="list-group-item"><b>Is Active :</b> @if($categories->is_active==1)Online @else Offline @endif</li>
                        <li class="list-group-item"><b>Create Date :</b> {{$categories->created_at}}</li>
                    </ul>
                </div>
                <div><a href="{{url("admin/categoriesIndex")}}" class="btn btn-info">Cancel</a></div>
            </div>
        </div>
    </div>
</div>
@endsection