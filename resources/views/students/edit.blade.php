@extends("layouts.main")

@section("title","Create Student")

@section("content")


<form method="post" action='{{asset("students/".$item->id)}}'>
    @csrf
    @method("put")
    <div class="form-row">


    </div>
    <div class="form-group">
        <label for="continent">Full Name</label>
        <input value='{{$item->name}}' type="text" name="name" class="form-control" id="continentid"
            placeholder="Enter Full Name">
    </div>

    <div class="form-group">
        <label for="continent">Email</label>
        <input value='{{$item->email}}' type="text" name="email" class="form-control" id="continentid"
            placeholder="Enter Email">
    </div>

    <div class="form-group">
        <label for="continent">Phone</label>
        <input value='{{$item->phone}}' type="text" name="phone" class="form-control" id="continentid"
            placeholder="Enter Mobile">
    </div>





    @if($item->gender=='m')

    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="m" checked>
        <label class="form-check-label" for="exampleRadios1">
            Male
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="f">
        <label class="form-check-label" for="exampleRadios1">
            Female
        </label>

    </div>



    @else
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="m">
        <label class="form-check-label" for="exampleRadios1">
            Male
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="f" checked>
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
        <input type="checkbox" name="active" />
    </div>
    @endif

    <div>
        <select class="form-control" name="city_id">
            <option value="">select city</option>
            @foreach($cities as $city)
            <option {{old('$city_id',$item->city_id)==$city->id?"selected":""}} value="{{$city->id}}">{{$city->name}}
            </option>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        <label for="name">Notes</label>
        <textarea type="text" name="notes" class="form-control" id="studentid" placeholder="Enter Phone">
    {{$item->notes}}
    </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{asset('students')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection