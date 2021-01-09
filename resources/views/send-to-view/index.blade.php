@extends("layouts.main")

@section("title","Send To View Data")

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


@endsection