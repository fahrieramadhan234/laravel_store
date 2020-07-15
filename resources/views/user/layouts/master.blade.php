<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
</head>

<body>

    @include('user.layouts.navbar')

    @yield('content')


    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
</body>

</html>