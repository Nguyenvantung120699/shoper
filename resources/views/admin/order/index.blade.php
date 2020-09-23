@extends("adminView.layoutAdmin")

@section("main_content")
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Order</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Customer Name </th>
                            <th> Telephone </th>
                            <th> Order date </th>
                            <th> Grand Total </th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $o)
                          <tr>
                            <td>{{$o->id}}</td>
                            <td>{{$o->customerName}}</td>
                            <td>{{$o->telephone}}</td>
                            <td>{{$o->created_at}}</td>
                            <td>{{$o->grandTotal}}</td>
                          </tr>
                          @empty
                          <tr>
                          <td><h2>No Order</h2></td>
                          </tr>
                          @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection