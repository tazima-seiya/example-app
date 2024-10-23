<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
        maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
    @stack('css_postForm')
</head>
<body class="bg-fixed" style="background-image: url({{ asset('img/bg-cross2.png') }});">
    {{ $slot }}
</body>
</html>
