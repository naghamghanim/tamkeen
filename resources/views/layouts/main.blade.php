<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>@yield("title")</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset ('/bootstrap/css/sticky-footer-navbar.css')}}" rel="stylesheet">
    @yield("css")
</head>

<body>

    @include('layouts.header')

    <!-- Begin page content -->
    <main role="main" class="container-fluid">
        <h1 class="mt-5">@yield("title")</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @include('layouts.shared.msg')

        @yield("content")
    </main>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">Place sticky footer content here.</span>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{asset('/bootstrap/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset ('/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield("js")


</body>

</html>