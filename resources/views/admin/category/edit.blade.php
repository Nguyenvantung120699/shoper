@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Edit Categories</h4>
            <form class="forms-sample" action="{{url("admin/category/update",['id'=>$categories->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label for="exampleInputUsername1">Categories Name</label>
                <input type="text" name="categories_name" class="form-control" value="{{$categories->categories_name}}" id="exampleInputUsername1">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>Logo</label>
                        <input type="file" id="uploadImage" name="logo" value="{{$categories->logo}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="col-sm-3">
                        <label>logo use</label><br/>
                        <img style="width:70px;" src="{{asset($categories->logo)}}">
                    </div>
                    <div id="result" class="uploadPreview col-sm-3">
                        <label>logo new</label>
                        
                    </div>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">History</label>
                <input type="text" name="description" value="{{$categories->description}}" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Is Active</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="is_active" id="exampleFormControlSelect1">
                               @if($categories->is_active == 1)
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