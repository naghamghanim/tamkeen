@extends("layouts.main")

@section("title","Create Employee")

@section("content")


  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="name">First Name</label>
    <input type="text" value="{{$item->firstname}}" name="firstname" class="form-control" id="studentid" placeholder="Enter First Name" disabled>
  </div>

  <div class="form-group">
    <label for="name">Last Name</label>
    <input type="text" value="{{$item->lastname}}" name="lastname" class="form-control" id="studentid" placeholder="Enter Last Name" disabled>
  </div>

  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" name="email" value="{{$item->email}}" class="form-control" id="studentid" placeholder="Enter Email" disabled>
  </div>

  <div class="form-group">
    <label for="name">Phone</label>
    <input type="text" name="phone" value="{{$item->phone}}" class="form-control" id="studentid" placeholder="Enter Phone" disabled>
  </div>

  <div class="form-group">
    <input {{$item->gender=='m'?"checked":""}} type="radio" name="gender" value="m"  disabled/>Male
    <input {{$item->gender=='f'?"checked":""}} type="radio" name="gender" value="f" disabled/>Female
  </div>

  

  <div class="form-group">
    <label for="name">EmpNo</label>
    <input type="text" name="empNo" value="{{$item->empNo}}" class="form-control" id="empno" placeholder="Enter EmpNo" disabled>
  </div>

  <div >
    <label for="name">Department Name</label>
        <select class="form-control" name="department_id" disabled>
       
            <option value="">Select Department</option>

            @foreach($departments as $dep)
            <option {{($item->department_id==$dep->id)?"selected":""}} value="{{$dep->id}}">{{$dep->name}}</option>
            @endforeach


        </select>
    </div>

    <br>
    <div >
    <label for="name">City</label>
        <select class="form-control" name="city_id" disabled>
       
            <option value="">Select City</option>

            @foreach($cities as $city)
            <option {{($item->city_id==$city->id)?"selected":""}} value="{{$city->id}}">{{$city->name}}</option>
            @endforeach


        </select>
    </div>

    <br>
  
  <a href="{{asset('employees-model')}}" class="btn btn-primary"> Cancel</a>
@endsection