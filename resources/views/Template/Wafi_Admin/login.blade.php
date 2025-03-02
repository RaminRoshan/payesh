<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="templates/Wafi_Admin/img/fav.png">
    <title>صفحه ورود | مدیریت محتوی پیشگامان</title>

    <base href="{{ config('app.url') }}">

    <link rel="stylesheet" href="templates/Wafi_Admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="templates/Wafi_Admin/css/main.css">
    
</head>

<body class="authentication">
    <div class="container" id="pishgaman">
        @yield('content')
    </div>
    @if(($mix ?? '') != '')
        @foreach ($mix as $item)
            @vite($item)
        @endforeach
    @endif
</body>
</html>
