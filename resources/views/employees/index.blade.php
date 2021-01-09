@extends("layouts.main")

@section("title","Manage Employees")

@section("content")
<div class="container">
    <a href="{{asset('employees/create')}}" class="btn btn-primary">Create New Contact</a>
</div>
<br>
<table class="table table-hover  table-sm mt-3">
    <thead>
        <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">EmpNo</th>
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
        <td scope="col">
            <form method="post" action='{{asset("employees/".$item->id)}}'>
                <a href="{{route('employees.show',$item->id)}}" class="btn btn-outline-success">Details</a>
                <a href="{{route('employees.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                @csrf
                @method("delete")
                <button onclick='return confirm("Are you sure????")' type="submit"
                    class="btn btn-outline-danger">Delete</button>
                    <a href="{{route('employees.delete',$item->id)}}" onclick='return confirm("Are you sure????")' class="btn btn-outline-danger">Delete</a>
            </form>
          
               

        </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection