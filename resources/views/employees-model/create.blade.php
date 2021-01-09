@extends("layouts.main")

@section("title","Create Employee")

@section("content")


<form enctype='multipart/form-data' method="post" action='{{route("employees-model.index")}}'>
    @csrf
    <div class="form-row">


    </div>
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="studentid"
            placeholder="Enter First Name">
    </div>

    <div class="form-group">
        <label for="name">Last Name</label>
        <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control" id="studentid"
            placeholder="Enter Last Name">
    </div>

    <div class="form-group">
        <label for="name">Email</label>
        <input type="text" name="email" value="{{old('email')}}" class="form-control" id="studentid"
            placeholder="Enter Email">
    </div>

    <div class="form-group">
        <label for="name">Phone</label>
        <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="studentid"
            placeholder="Enter Phone">
    </div>

    <div class="form-group">
        <input {{old('gender')=='m'?"checked":""}} type="radio" name="gender" value="m" />Male
        <input {{old('gender')=='f'?"checked":""}} type="radio" name="gender" value="f" />Female
    </div>



    <div class="form-group">
        <label for="name">EmpNo</label>
        <input type="text" name="empNo" value="{{old('empNo')}}" class="form-control" id="empno"
            placeholder="Enter EmpNo">
    </div>

    <div>
        <label for="name">Department Name</label>
        <select class="form-control" name="department_id">

            <option value="">Select Department</option>

            @foreach($departments as $dep)
            <option {{old('department_id')==$dep->id?"selected":""}} value="{{$dep->id}}">{{$dep->name}}</option>

            @endforeach


        </select>
    </div>
    <br>
    <div>
        <label for="name">City</label>
        <select class="form-control" name="city_id">

            <option value="">Select City</option>

            @foreach($cities as $city)
            <option {{old('city_id')==$city->id?"selected":""}} value="{{$city->id}}">{{$city->name}}</option>

            @endforeach


        </select>
    </div>
    <br>

    <div class="form-group">
        <label for="name">Active</label>
        <!--<input type='hidden' value='0' name='active'/>-->
        <input value='1' type="checkbox" {{old('active')?"checked":""}} name="active" />
    </div>

       
            <div class="form-group">
                <label for="name">Select File</label>
                <input value="{{old('file')}}" type="file" name="file" class="form-control" id="studentid" />
            </div>

        

    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{asset('employees')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection