@extends("layouts.main")

@section("title","Manage Continents")

@section("content")
<div class="container">
    <a href="{{asset('continents/create')}}" class="btn btn-primary">Create New Continent</a>
</div>
<br>
<table class="table table-hover  table-sm mt-3">
    <thead>
        <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col">Name</th>

            <th scope="col" width="30%">Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
        <td scope="col">{{$item->id}}</td>
        <td scope="col">{{$item->name}}</td>
        <td scope="col">
            <form method="post" action='{{asset("continents/".$item->id)}}'>
                <a href="{{route('continents.show',$item->id)}}" class="btn btn-outline-success">Details</a>
                <a href="{{route('continents.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                @csrf
                @method("delete")
                <button onclick='return confirm("Are you sure????")' type="submit"
                    class="btn btn-outline-danger">Delete</button>

            </form>

        </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection