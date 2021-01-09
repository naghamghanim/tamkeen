@extends("layouts.main")

@section("title","Create Employee")

@section("content")


  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="name">First Name</label>
    <input type="text" value="{{$item->firstname}}" name="firstname" class="form-control" id="studentid" placeholder="Enter First Name" >
  </div>

  <div class="form-group">
    <label for="name">Last Name</label>
    <input type="text" value="{{$item->lastname}}" name="lastname" class="form-control" id="studentid" placeholder="Enter Last Name" >
  </div>

  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" name="email" value="{{$item->email}}" class="form-control" id="studentid" placeholder="Enter Email" >
  </div>

  <div class="form-group">
    <label for="name">Phone</label>
    <input type="text" name="phone" value="{{$item->phone}}" class="form-control" id="studentid" placeholder="Enter Phone" >
  </div>

  <div class="form-group">
    <input {{$item->gender=='m'?"checked":""}} type="radio" name="gender" value="m" />Male
    <input {{$item->gender=='f'?"checked":""}} type="radio" name="gender" value="f" />Female
  </div>

  

  <div class="form-group">
    <label for="name">EmpNo</label>
    <input type="text" name="empNo" value="{{$item->empNo}}" class="form-control" id="empno" placeholder="Enter EmpNo" >
  </div>
  
  <a href="{{asset('employees')}}" class="btn btn-primary"> Cancel</a>
@endsection