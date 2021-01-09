@extends("layouts.main")

@section("title","Show Details")

@section("content")

<div>
  <div class="form-row">


  </div>
  <div class="form-group">
    <label for="continent">Continent Name</label>
    <input type="text" name="name" class="form-control" id="continentid" value='{{$item->name}}' readonly>
  </div>
  
  <a href="{{asset('continents')}}" class="btn btn-primary"> Continents</a>

</div>
@endsection