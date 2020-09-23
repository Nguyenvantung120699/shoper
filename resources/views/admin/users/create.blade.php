@extends("layouts.layoutAdmin")

@section("main_content")
<div class="col-12">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create User Admin</h4>
        <form class="form-sample" action="{{url("admin/user/store")}}" method="post">
        @csrf
            <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                <input type="text" name="email" value="{{old("email")}}" class="form-control @if($errors->has("email")) is-invalid @endif" id="exampleInputUsername1" placeholder="Email">
                    @if($errors->has("email"))
                        <p style="color:red">{{$errors->first("email")}}</p>
                    @endif
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">User Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" value="{{old("name")}}" class="form-control @if($errors->has("name")) is-invalid @endif" id="exampleInputUsername1" placeholder="User Name">
                    @if($errors->has("name"))
                        <p style="color:red">{{$errors->first("name")}}</p>
                    @endif
                </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" value="{{old("password")}}" class="form-control @if($errors->has("password")) is-invalid @endif" id="exampleInputUsername1" placeholder="Password">
                    @if($errors->has("password"))
                        <p style="color:red">{{$errors->first("password")}}</p>
                    @endif
                </div>
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Roles Admin</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="roles" id="exampleFormControlSelect1">
                               <option selected value="1">Admin</option>
                                <option value="0">Client</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection