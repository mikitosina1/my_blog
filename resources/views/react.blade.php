@php
    $lang = [
        'aside' => trans('aside'),
        'home' => trans('home'),
        'about' => trans('about'),
        'basic' => trans('basic'),
        'user_cloud' => trans('user_cloud')
    ];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test page for react learning</title>
    <script>
        window.Localization = {
            locale: "{{ app()->getLocale() }}",

            translations: @json($lang)
        };
    </script>
    @vite('resources/ts/app/main.tsx')
</head>
<body>
    <div id="app"></div>
</body>
</html>
