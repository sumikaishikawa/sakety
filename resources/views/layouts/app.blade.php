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
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css" >
        
        <script>
        $( function() {
            var dates = jQuery( '#datepickerFrom, #datepickerTo' ) . datepicker( {
                showAnim: 'drop',
                numberOfMonths: 1,
                showCurrentAtPos: 1,
                dateFormat: 'yy-mm-dd',
                onSelect: function( selectedDate ) {
                    var option = this . id == 'datepickerFrom' ? 'minDate' : 'maxDate',
                        instance = $( this ) . data( 'datepicker' ),
                        date = $ . datepicker . parseDate(
                            instance . settings . dateFormat ||
                            $ . datepicker . _defaults . dateFormat,
                            selectedDate, instance . settings );
                    dates . not( this ) . datepicker( 'option', option, date );
                }
            });
        });
        
        
        </script>
    </head>
    <body>
        @include('commons.navbar')

        <div class="container">
            @include('commons.error_messages')

            @yield('content')
        </div>
    </body>
</html>