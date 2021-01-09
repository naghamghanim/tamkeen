@extends("layouts.main")

@section("title","Create Employee")

@section("content")


<form  enctype='multipart/form-data' method="post" action='{{asset("employees-model/".$item->id)}}'>
    @csrf
    @method("put")

    <div class="form-row">

    </div>
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" value="{{$item->firstname}}" name="firstname" class="form-control" id="studentid"
            placeholder="Enter First Name">
    </div>

    <div class="form-group">
        <label for="name">Last Name</label>
        <input type="text" value="{{$item->lastname}}" name="lastname" class="form-control" id="studentid"
            placeholder="Enter Last Name">
    </div>

    <div class="form-group">
        <label for="name">Email</label>
        <input type="text" name="email" value="{{$item->email}}" class="form-control" id="studentid"
            placeholder="Enter Email">
    </div>

    <div class="form-group">
        <label for="name">Phone</label>
        <input type="text" name="phone" value="{{$item->phone}}" class="form-control" id="studentid"
            placeholder="Enter Phone">
    </div>

    <div class="form-group">
        <input {{$item->gender=='m'?"checked":""}} type="radio" name="gender" value="m" />Male
        <input {{$item->gender=='f'?"checked":""}} type="radio" name="gender" value="f" />Female
    </div>



    <div class="form-group">
        <label for="name">EmpNo</label>
        <input type="text" name="empNo" value="{{$item->empNo}}" class="form-control" id="empno"
            placeholder="Enter EmpNo">
    </div>

    <div>
        <label for="name">Department Name</label>
        <select class="form-control" name="department_id">

            <option value="">Select Department</option>

            @foreach($departments as $dep)
            <option {{old('$department_id', $item->department_id)==$dep->id?"selected":""}} value="{{$dep->id}}">
                {{$dep->name}}</option>

            @endforeach


        </select>
    </div>
    <br>
    <div>
        <label for="name">City</label>
        <select class="form-control" name="city_id">

            <option value="">Select City</option>

            @foreach($cities as $city)
            <option {{old('$city_id', $item->city_id)==$city->id?"selected":""}} value="{{$city->id}}">
                {{$city->name}}</option>
            @endforeach
        </select>
    </div>
    <br>
    
@if($item->active=='1')
<div class="form-group">
    <label for="name">Active</label>
    <input type="checkbox" name="active" checked />
</div>
@else
<div class="form-group">
    <label for="name">Active</label>
    <input type="checkbox" name="active" />
</div>
@endif

<div>
<br>

    <div class="form-group">
    <img src={{asset('$item->image')}} width=200 height=200 />
                <label for="name">Select File</label>
                <input value="{{old('file')}}" type="file" name="image" class="form-control" id="studentid" />
            </div>


    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{asset('employees-model')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection