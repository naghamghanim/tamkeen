@extends("layouts.main")

@section("title","Manage Employees-Model Advanced Search")

@section("content")
<form class="row">
    <div class="col-sm-4">
        <input type="text" class="form-control" value="{{request()->q}}" autofocus name="q"
            placeholder="Enter your Search....." />
    </div>
    <div class="col-sm-2">
        <select class="form-control" name="gender">
            <option value="">Not Selected</option>
            <option {{request()->gender=='m'?"selected":""}} value="m">Male</option>
            <option {{request()->gender=='f'?"selected":""}} value="f">Female</option>

        </select>
    </div>

    <div class="col-sm-2">
        <select class="form-control" name="city_id">
            <option value="">Not Selected</option>
            @foreach($cities as $city)
            <option {{request()->city_id==$city->id?"selected":""}}  value="{{$city->id}}">{{$city->name}}</option>            
            @endforeach
        </select>
    </div>

    <div class="col-sm-2">
        <select class="form-control" name="active">
            <option value="">Not Selected</option>
            <option {{request()->active=='0'?"selected":""}} value="0">In Active</option>
            <option {{request()->active=='1'?"selected":""}} value="1">Active</option>

        </select>
    </div>


    <div class="col-sm-2">
        <input type="submit" class="btn btn-success" value="search" />
    </div>
    <div class="col-sm-3">
        <a href="{{asset('employees-model/create')}}" class="btn btn-primary">Create New Contact</a>
    </div>

</form>
@if($items->count()>0)
<table class="table table-hover  table-sm mt-">
    <thead>
        <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">EmpNo</th>
            <th scope="col">City</th>
            <th scope="col">Department</th>
            <th scope="col">Active</th>
            <th scope="col" width="30%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td scope="col">{{$item->id}}</td>
            <td scope="col">{{$item->firstname}}</td>
            <td scope="col">{{$item->lastname}}</td>
            <td scope="col">{{$item->phone}}</td>
            <td scope="col">{{$item->email}}</td>
            <td scope="col">{{$item->gender=='m'?"Male":"Female"}}</td>
            <td scope="col">{{$item->empNo}}</td>
            <td scope="col">{{$item->city->name??''}}</td>
            <td scope="col">{{$item->department->name??''}}</td>
            <td scope="col">{{$item->active==1?'Active':'In Active'}}</td>
            <td scope="col">
                <form method="post" action='{{asset("employees-model/".$item->id)}}'>
                    <a href="{{route('employees-model.show',$item->id)}}" class="btn btn-outline-success">Details</a>
                    <a href="{{route('employees-model.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                    @csrf
                    @method("delete")
                    <button onclick='return confirm("Are you sure????")' type="submit"
                        class="btn btn-outline-danger">Delete</button>
                    <a href="{{route('employees-model.delete',$item->id)}}" onclick='return confirm("Are you sure????")'
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
<div></div>
@endsection