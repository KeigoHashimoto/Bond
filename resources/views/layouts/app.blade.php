<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href={{ asset('/css/app.css') }} rel="stylesheet">
    <link rel="stylesheet" href={{ asset('/css/style.css') }}>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <title>HinodeCommunity</title>
</head>
<body>

    @include('commons.error')
    <div id="app">
        @include('commons.header')
        @yield('content')
    </div>

    <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src={{ asset('/js/app.js') }}></script>
</body>
</html>