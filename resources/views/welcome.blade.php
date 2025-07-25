<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GPC</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Candal&display=swap" rel="stylesheet">

        <link href="{{ asset('css/gpc.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('image/logo.svg') }}">
        
    </head>
    <body>
        <div class="centrar-logo">
    <div class="logo" >
                    <img src= "{{ asset('image/logo.svg') }}" alt="gpc" width="200" height="200" style="margin:10px">
                </div>
        <div class="relative flex  justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="logo">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="boton-ingresar">Ingresar</a>
                    @endauth
                </div>
            @endif


        </div>
</div>
    </body>
</html>