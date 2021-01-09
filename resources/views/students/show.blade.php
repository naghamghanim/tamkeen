@extends("layouts.main")

@section("title","Show Student")

@section("content")



<div class="form-row">
</div>

<div class="form-group">
    <label for="continent">Full Name</label>
    <input value='{{$item->name}}' type="text" readonly name="name" class="form-control" id="continentid"
        placeholder="Enter Full Name">
</div>

<div class="form-group">
    <label for="continent">Email</label>
    <input value='{{$item->email}}' type="text" readonly name="email" class="form-control" id="continentid"
        placeholder="Enter Email">
</div>

<div class="form-group">
    <label for="continent">Phone</label>
    <input value='{{$item->phone}}' type="text" readonly name="phone" class="form-control" id="continentid"
        placeholder="Enter Mobile">
</div>





@if($item->gender=='m')

<div class="form-check">
    <input class="form-check-input" disabled type="radio" name="gender" id="exampleRadios1" value="m" checked>
    <label class="form-check-label" for="exampleRadios1">
        Male
    </label>
</div>
<div class="form-check">
    <input class="form-check-input" disabled type="radio" name="gender" id="exampleRadios1" value="f">
    <label class="form-check-label" for="exampleRadios1">
        Female
    </label>

</div>



@else
<div class="form-check">
    <input class="form-check-input" disabled type="radio" name="gender" id="exampleRadios1" value="m">
    <label class="form-check-label" for="exampleRadios1">
        Male
    </label>
</div>
<div class="form-check">
<label>Gender</label>
    <input class="form-check-input" disabled type="radio" name="gender" id="exampleRadios1" value="f" checked>
    <label class="form-check-label" for="exampleRadios1">
        Female
    </label>

</div>

@endif


@if($item->active=='1')
<div class="form-group">
    <label for="name">Active</label>
    <input type="checkbox" name="active" checked />
</div>
@else
<div class="form-group">
    <label for="name">Active</label>
    <input type="checkbox" disable name="active" />
</div>
@endif


<div class="form-group">
    <label for="name">City</label>
    <input  type="text" readonly readonly name="city" class="form-control" value={{$city}}>
    
</div>

<div class="form-group">
    <label for="name">Notes</label>
    <textarea type="text" readonly name="notes" class="form-control" id="studentid" placeholder="Enter Phone">
    {{$item->notes}}
    </textarea>
</div>
<a href="{{asset('students')}}" class="btn btn-primary"> Cancel</a>

@endsection