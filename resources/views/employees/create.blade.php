@extends("layouts.main")

@section("title","Create Employee")

@section("content")


<form method="post" action='{{route("employees.index")}}'> 
@csrf
  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="name">First Name</label>
    <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="studentid" placeholder="Enter First Name" >
  </div>

  <div class="form-group">
    <label for="name">Last Name</label>
    <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control" id="studentid" placeholder="Enter Last Name" >
  </div>

  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" name="email" value="{{old('email')}}" class="form-control" id="studentid" placeholder="Enter Email" >
  </div>

  <div class="form-group">
    <label for="name">Phone</label>
    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="studentid" placeholder="Enter Phone" >
  </div>

  <div class="form-group">
    <input {{old('gender')=='m'?"checked":""}} type="radio" name="gender" value="m" />Male
    <input {{old('gender')=='f'?"checked":""}} type="radio" name="gender" value="f" />Female
  </div>

  

  <div class="form-group">
    <label for="name">EmpNo</label>
    <input type="text" name="empNo" value="{{old('empNo')}}" class="form-control" id="empno" placeholder="Enter EmpNo" >
  </div>
  
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{asset('employees')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection