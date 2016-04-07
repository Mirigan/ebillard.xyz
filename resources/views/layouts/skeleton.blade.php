<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Ebillard.xyz</title>
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body class="landing">
        <div id="page-wrapper">
            @include('partials._menu')
            @include('partials._banner')
            @yield('content')
            @include('partials._footer')
        </div>
        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
