@extends("layouts.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Data</h4>
                <a href="{{url("admin/user/create")}}"><button class="btn btn-success"> Create Admin User </button></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->email}}</td>
                            @if($c->roles == 1)
                                <td><label class="badge badge-success">Admin</label></td>
                            @else
                                <td><label class="badge badge-danger">Client</label></td>
                            @endif
                            <td>
                                <a href="{{url("admin/user/edit",['id'=>$c->id])}}"><label class="badge badge-info">Edit</label></a>
                                <a href="{{url("admin/user/delete",['id'=>$c->id])}}"><label class="badge badge-warning">Delete</label></a>
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