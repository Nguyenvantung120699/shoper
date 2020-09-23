@extends("layouts.layoutAdmin")

@section("main_content")
<div class="col-12">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create Product</h4>
        <form class="form-sample" action="{{url("admin/product/store")}}" method="post" enctype="multipart/form-data"">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" value="{{old("product_name")}}" class="form-control @if($errors->has("product_name")) is-invalid @endif" id="exampleInputUsername1" placeholder="Product Name">
                            @if($errors->has("product_name"))
                                <p style="color:red">{{$errors->first("product_name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                        <input type="text" name="product_description" value="{{old("product_description")}}" class="form-control @if($errors->has("product_description")) is-invalid @endif" id="exampleInputUsername1" placeholder="Product Description">
                            @if($errors->has("product_description"))
                                <p style="color:red">{{$errors->first("product_description")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Thumbnail</label>
                        <div class="col-sm-5">
                            <input type="file" id="uploadImage" name="thumbnail" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div id="result" class="uploadPreview col-sm-4">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gallery</label>
                        <div class="col-sm-5">
                            <input type="file" id="uploadImage2" name="gallery[]" multiple class="form-control" id="exampleInputEmail1">
                        </div>
                        <div id="result2" class="uploadPreview col-sm-4">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Brands</label>
                        <div class="col-sm-9">
                            <select class="form-control @if($errors->has("brand_name")) is-invalid @endif" value="{{old("brand_name")}}" name="brand_id" id="exampleFormControlSelect1">
                                @php
                                    $brands = \App\Models\Brand::all();
                                @endphp
                                    <option selected value=""></option>
                                @foreach($brands as $c)
                                    <option value="{{$c->id}}">{{$c->brands_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has("brandsName"))
                                <p style="color:red">{{$errors->first("brands_name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Categories</label>
                        <div class="col-sm-9">
                            <select class="form-control @if($errors->has("category_name")) is-invalid @endif" value="{{old("category_name")}}" name="category_id" id="exampleFormControlSelect1">
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp
                                    <option selected value=""></option>
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->categories_name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has("category_name"))
                                <p style="color:red">{{$errors->first("categories_name")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="number" name="price" value="{{old("price")}}" class="form-control @if($errors->has("price")) is-invalid @endif" id="exampleInputPassword1" placeholder="Price">
                            @if($errors->has("price"))
                                <p style="color:red">{{$errors->first("price")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Quantity</label>
                        <div class="col-sm-9">
                            <input type="number" name="quantity" value="{{old("quantity")}}" class="form-control @if($errors->has("quantity")) is-invalid @endif" id="exampleInputPassword1" placeholder="Quantity">
                            @if($errors->has("quantity"))
                                <p style="color:red">{{$errors->first("quantity")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                            <input type="text" name="color" value="{{old("color")}}" class="form-control @if($errors->has("color")) is-invalid @endif" id="exampleInputPassword1" placeholder="Color">
                            @if($errors->has("color"))
                                <p style="color:red">{{$errors->first("color")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-9">
                            <input type="text" name="size" value="{{old("size")}}" class="form-control @if($errors->has("size")) is-invalid @endif" id="exampleInputPassword1" placeholder="Size">
                            @if($errors->has("size"))
                                <p style="color:red">{{$errors->first("size")}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Classify</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="classify" id="exampleFormControlSelect1">
                                    <option selected value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Is Active</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="is_active" id="exampleFormControlSelect1">
                                <option selected value="1">On</option>
                                    <option value="0">Off</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-gradient-primary mr-2" value="Upload">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection