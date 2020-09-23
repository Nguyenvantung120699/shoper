@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Brand</h4>
                <div class="table-responsive">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-info"><b>Id : </b> {{$brands->id}}</li>
                        <li class="list-group-item list-group-item-info"><b>Name : </b> {{$brands->brands_name}}</li>
                        <li class="list-group-item list-group-item-info"><b>Logo : </b><img style="width:100px;" src="{{asset($brands->logo)}}" alt=""></li>
                        <li class="list-group-item list-group-item-info"><b>History : </b> {{$brands->history}}</li>
                        <li class="list-group-item list-group-item-info"><b>Is Active : </b> @if($brands->is_active==1)Online @else Offline @endif</li>
                        <li class="list-group-item list-group-item-info"><b>Create Date : </b> {{$brands->created_at}}</li>
                    </ul>
                </div>
                <div><a href="{{url("admin/brandIndex")}}" class="btn btn-info">Cancel</a></div>
            </div>
        </div>
    </div>
</div>
@endsection