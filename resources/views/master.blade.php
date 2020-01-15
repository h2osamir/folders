<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootsrtap.min.css')}}">
    @yield('stylesheets') 

    <title>blog | laravel voyager</title>
</head>
<body>
@include('partials.navbar')

@yield('slider') 

<div class="container" mt-4 >
@yield('content') 
</div>





    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

   @yield('javascripts') 
</body>
</html>