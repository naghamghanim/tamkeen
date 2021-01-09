@extends("layouts.main")

@section("title","Manage students-model Search")

@section("content")

<form class='row mb-2'>
    <div class='col-sm-8'>
        <input type="text" name="q" value='{{request()->q}}' autofocus class="form-control" placeholder="Enter your search" />
    </div>

    <div class='col-sm-'>
        <input type="submit" value="search" class="btn btn-success" />
    </div>

    <div class='col-sm-3'>
        <a href="{{asset('students-model/create')}}" class="btn btn-primary">Create New Contact</a>
    </div>

</form>

@if($items->count()>0)
<table class="table table-hover  table-sm mt-3">
    <thead>
        <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Gender</th>
            <th scope="col">Active</th>
            <th scope="col">City</th>

            <th scope="col" width="30%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td scope="col">{{$item->id}}</td>
            <td scope="col">{{$item->name}}</td>
            <td scope="col">{{$item->email}}</td>
            <td scope="col">{{$item->phone}}</td>
            <td scope="col">{{$item->gender=='m'?"Male":"Female"}}</td>
            <td scope="col">{{$item->active=='1'?"Active":"Not Avtive"}}</td>
            <td scope="col">{{$item->city->name??''}}</td>

            <td scope="col">
                <form method="post" action='{{asset("students-model/".$item->id)}}'>
                    <a href="{{route('students-model.show',$item->id)}}" class="btn btn-outline-success">Details</a>
                    <a href="{{route('students-model.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                    @csrf
                    @method("delete")
                    <button onclick='return confirm("Are you sure????")' type="submit"
                        class="btn btn-outline-danger">Delete</button>
                    <a href="{{route('students-model.delete',$item->id)}}" onclick='return confirm("Are you sure????")'
                        class="btn btn-outline-danger">Delete</a>
                </form>



            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@else

<div class="alert alert-info"> <b>Sorry</b> there is no results to your search ! </div>

@endif


@endsection