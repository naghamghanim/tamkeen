@extends("layouts.main")

@section("title","Create Student")

@section("content")


<form method="post" action='{{route("students-model.index")}}'>
    @csrf
    <div class="form-row">


    </div>
    <div class="form-group">
        <label for="name">Student Name</label>
        <input type="text" value="{{old('name')}}" name="name" class="form-control" id="studentid"
            placeholder="Enter Student Name">
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
        <label for="name">Active</label>
        <!--<input type='hidden' value='0' name='active'/>-->
        <input value='1' type="checkbox" {{old('active')?"checked":""}} name="active" />
    </div>

    <div class="form-group">

        <input {{old('gender')=='m'?"checked":""}} type="radio" name="gender" value="m" />Male
        <input {{old('gender')=='f'?"checked":""}} type="radio" name="gender" value="f" />Female

    </div>
    <div>
        <select class="form-control" name="city_id">
            <option value="">select city</option>
            @foreach($items as $item)
            <option {{old('city_id')==$item->id?"selected":""}} value="{{$item->id}}">{{$item->name}} ({{$item->students->count()}})</option>
            @endforeach
        </select>

    </div>







    <div class="form-group">
        <label for="name">Notes</label>
        <textarea type="text" name="notes" class="form-control" id="studentid" placeholder="Enter Phone">
    {{old('notes')}}
    </textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    <a href="{{asset('students-model')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection