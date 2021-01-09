@extends("layouts.main")

@section("title","Create Continent")

@section("content")


<form method="post" action='{{route("continents.index")}}'> 
@csrf
  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="continent">Continent Name</label>
    <input type="text" name="name" class="form-control" id="continentid" placeholder="Enter Continent" >
  </div>
  
  <button type="submit" class="btn btn-primary">Create</button>
  <a href="{{asset('continents')}}" class="btn btn-primary"> Continents</a>

</form>
@endsection