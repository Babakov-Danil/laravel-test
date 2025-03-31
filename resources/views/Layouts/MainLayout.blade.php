<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/bootstrap.min.css', 'resources/js/app.js'])

    <style>
        @media screen and (prefers-reduced-motion: reduce) {
            .fade {
                transition: opacity .15s linear;
            }
        }
    </style>
</head>

<body>
    @include('.NavBar')

    {{--<button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>--}}

    @if(Session::has('message'))
        <div style="position: absolute; top: 0; right: 0; width: 240px; margin: 1rem">
            <div class="alert alert-dismissible fade show alert-success" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container mt-4">
        @yield('app')
    </div>
</body>

</html>