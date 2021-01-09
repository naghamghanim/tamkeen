@extends("layouts.main")

@section("title","Edit Continent")

@section("content")


<form method="post" action='{{asset("continents/".$item->id)}}'> 
@csrf
@method("put")
  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="continent">Continent Name</label>
    <input type="text" name="name" class="form-control" id="continentid" value='{{$item->name}}' >
  </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{asset('continents')}}" class="btn btn-primary"> Cancel</a>

</form>
@endsection