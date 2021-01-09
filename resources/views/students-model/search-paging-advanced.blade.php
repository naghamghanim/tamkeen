@extends("layouts.main")

@section("title","Manage students-model Advanced Search")

@section("content")

<form class='row mb-2'>
    <div class='col-sm-6'>
        <input type="text" name="q" value='{{request()->q}}' autofocus class="form-control"
            placeholder="Enter your search" />
    </div>
    <div class="col-sm-2">
        <select name="gender" class="form-control">
            <option value="">Any Gender</option>
            <option {{request()->gender=='m'?"selected":""}} value="m">Male
            </option>
            <option {{request()->gender=='f'?"selected":""}} value="f">Female</option>
        </select>
    </div>

    <div class="col-sm-2">
        <select name="active" class="form-control">
            <option value="">Any Status</option>
            <option {{request()->active=='1'?"selected":""}} value="1">Active
            </option>
            <option {{request()->active=='0'?"selected":""}} value="0">Not Active</option>
        </select>
    </div>

    <div class='col-sm-2'>
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
            <td scope="col">{{$item->active=='1'?"Active":"Not Active"}}</td>
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
{{$items->links()}}
@else

<div class="alert alert-info"> <b>Sorry</b> there is no results to your search ! </div>

@endif


@endsection