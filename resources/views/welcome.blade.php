<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GPC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/gpc.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
    <div class="logo" >
                    <img src= "{{ asset('image/gpc.png') }}" alt="gpc" width="500" height="500" style="margin:10px">
                </div>
        <div class="relative flex  justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="logo">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="boton-ingresar">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="boton-ingresar">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>
    </body>
</html>