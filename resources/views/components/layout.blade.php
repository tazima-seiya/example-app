<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
        maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'つぶやきアプリ' }}</title>
    @stack('css')
</head>
<body class="bg-fixed"
style="background-image:url({{ asset('img/ichimatsu2.png') }})">
    {{ $slot }}
</body>
</html>
