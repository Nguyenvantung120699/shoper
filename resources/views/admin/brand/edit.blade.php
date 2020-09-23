@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Edit brand</h4>
            <form class="forms-sample" action="{{url("admin/brand/update",['id'=>$brands->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="exampleInputUsername1">Brand Name</label>
                <input type="text" name="brands_name" class="form-control @if($errors->has("brands_name")) is-invalid @endif" value="{{$brands->brands_name}}" id="exampleInputUsername1">
                    @if($errors->has("brands_name"))
                    <p style="color:red">{{$errors->first("brands_name")}}</p>
                    @endif
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Logo</label>
                        <input type="file" id="uploadImage" name="logo" value="{{$brands->logo}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-sm-3">
                        <label>logo use</label><br/>
                        <img style="width:70px;" src="{{asset($brands->logo)}}">
                    </div>
                    <div id="result" class="uploadPreview col-sm-3">
                        <label>logo new</label>
                        
                    </div>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">History</label>
                <input type="text" name="history" value="{{$brands->history}}" class="form-control @if($errors->has("history")) is-invalid @endif" id="exampleInputPassword1">
                    @if($errors->has("history"))
                    <p style="color:red">{{$errors->first("history")}}</p>
                    @endif
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Is Active</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="is_active" id="exampleFormControlSelect1">
                               @if($brands->is_active == 1)
                               <option selected value="1">On</option>
                                <option value="0">Off</option>
                                @else
                                <option selected value="0">Off</option>
                                <option value="1">On</option>
                                @endif
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection