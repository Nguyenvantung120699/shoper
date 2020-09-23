@extends("layouts.layoutAdmin")

@section("main_content")
<div class="col-12">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Edit User Admin</h4>
        <form class="form-sample" action="{{url("admin/user/update",['id'=>$user->id])}}" method="post">
        @csrf
            <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                <input type="text" name="email" class="form-control" value="{{$user->email}}" id="exampleInputUsername1" placeholder="Email">
                </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                <label class="col-sm-3 col-form-label">User Name</label>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" id="exampleInputUsername1" placeholder="User Name">
                </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group row">
                    <label class="col-sm-6 col-form-label">Roles Admin</label>
                    <div class="col-sm-6">
                        <select class="form-control" name="roles" id="exampleFormControlSelect1">
                               @if($user->roles == 1)
                               <option selected value="1">Admin</option>
                                <option value="0">Client</option>
                                @else
                                <option selected value="0">Client</option>
                                <option value="1">Admin</option>
                                @endif
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