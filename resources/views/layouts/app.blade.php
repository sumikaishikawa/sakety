<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sakety</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}"> <!--add-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.11/js/all.js"></script>
    </head>
    <body>
        @include('commons.navbar')

        <div class="container">
            @include('commons.error_messages')

            @yield('content')
        </div>
    </body>
</html>