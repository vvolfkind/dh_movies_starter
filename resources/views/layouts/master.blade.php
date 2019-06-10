    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>DH Movies!</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <style>
            ul {
                list-style: none;
            }
            .spacer {
                padding-top: 15px;
                padding-bottom: 15px;
            }
        </style>
    </head>

    <body>

        @include('layouts.partials.navbar')

        <div class="spacer"></div>
        <div class="spacer"></div>
        
        @yield('content')

        <div class="spacer"></div>

        @include('layouts.partials.footer')
        @include('layouts.partials.scripts')

    </body>
    </html>
