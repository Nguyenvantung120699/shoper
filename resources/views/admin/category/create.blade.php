@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Create categories</h4>
            <form class="forms-sample"  action="{{url("admin/category/store")}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                <label for="exampleInputUsername1">Category Name</label>
                <input type="text" name="categories_name" value="{{old("categories_name")}}" class="form-control @if($errors->has("categories_name")) is-invalid @endif" id="exampleInputUsername1" placeholder="Category Name">
                    @if($errors->has("categories_name"))
                        <p style="color:red">{{$errors->first("categories_name")}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Logo</label>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 row">
                                <input type="file" name="logo" value="{{old("logo")}}" id="uploadImage" class="imgupload form-control @if($errors->has("logo")) is-invalid @endif">
                            </div>
                            <div id="result" class="uploadPreview col-md-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <input type="text" name="description" value="{{old("description")}}" class="form-control @if($errors->has("description")) is-invalid @endif" id="exampleInputPassword1" placeholder="Description">
                    @if($errors->has("description"))
                        <p style="color:red">{{$errors->first("description")}}</p>
                    @endif
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Is Active</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="is_active" id="exampleFormControlSelect1">
                               <option selected value="1">On</option>
                                <option value="0">Off</option>
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