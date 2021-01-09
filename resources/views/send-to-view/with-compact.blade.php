@extends("layouts.main")

@section("title","Send To View Data-Compact")

@section("content")
<ul>
    <li>
        <a href="{{asset('send-to-view/with')}}">Using with</a>
    </li>

    <li>
        <a href="{{asset('send-to-view/with-name')}}">Using with Name</a>
    </li>
    <li>
        <a href="{{asset('send-to-view/with-compact')}}">Using Compact</a>
    </li>

</ul>


<b>Users Count: {{$userCount}}</b>
<br>
<b>Colors</b>
<ul>
    @foreach($colors as $c)
    <li>
        {{$c}}
    </li>
    @endforeach
</ul>


@endsection