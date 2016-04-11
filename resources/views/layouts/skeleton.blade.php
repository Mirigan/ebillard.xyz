<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title') | Ebillard.xyz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
		<div id="page-wrapper">
            @include('partials._menu')

            @yield('content')

            @include('partials._footer')
        </div>
    </body>
    <script src="{{ elixir('js/app.js') }}"></script>
</html>
