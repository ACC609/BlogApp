<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- FontAwesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">

        <title>{{ $title ?? 'Page Title' }}</title>

        @livewireStyles
    </head>
    <body>
        @livewire('partials.navbar-page')
        <div>
            {{ $slot }}
        </div>


        @livewire('Partials.footer-Page')
         <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{asset('js/jquery/jquery-2.2.4.min.js')}}"></script>
        <!-- Popper js -->
        <script src="{{asset('js/bootstrap/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
        <!-- All Plugins js -->
        <script src="{{asset('js/plugins/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{asset('js/active.js')}}"></script>
        @livewireScripts
    </body>

</html>
