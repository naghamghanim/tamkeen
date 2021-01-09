@extends("layouts.main")

@section("title","View - Show all records")

@section("content")
<div class="container">
    <button type="button" class="btn btn-primary">Create New Record</button>
</div>
<br>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Brand</th>
            <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>ghgh</td>
            <td>

                <form method="post" action='{{asset("products/10")}}'>
                    <a href="{{asset('products/10/show')}}" class="btn btn-outline-success">Details</a>
                    <a href="{{asset('products/10/edit')}}" class="btn btn-outline-primary">Edit</a>
                    @csrf
                    @method("delete")
                    <button onclick='return confirm("Are you sure????")' type="submit" class="btn btn-outline-danger">Edit</button>

                </form>


            </td>

        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>ghgh</td>
            <td>
            <form method="post" action='{{asset("products/10")}}'>
                    <a href="{{asset('products/10/show')}}" class="btn btn-outline-success">Details</a>
                    <a href="{{asset('products/10/edit')}}" class="btn btn-outline-primary">Edit</a>
                    @csrf
                    @method("delete")
                    <button onclick='return confirm("Are you sure????")' type="submit" class="btn btn-outline-danger">Edit</button>

                </form>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>ghgh</td>
            <td>
            <form method="post" action='{{asset("products/10")}}'>
                    <a href="{{asset('products/10/show')}}" class="btn btn-outline-success">Details</a>
                    <a href="{{asset('products/10/edit')}}" class="btn btn-outline-primary">Edit</a>
                    @csrf
                    @method("delete")
                    <button onclick='return confirm("Are you sure????")' type="submit" class="btn btn-outline-danger">Edit</button>

                </form>
            </td>
        </tr>
    </tbody>
</table>

@endsection