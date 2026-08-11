<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test page for react learning</title>
    @vite('resources/ts/app/main.tsx')
</head>
<body>
    <div id="app"></div>
</body>
</html>
