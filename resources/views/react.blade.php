<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test page for react learning</title>
    <script>
        window.Localization = {
            locale: "{{ app()->getLocale() }}",

            translations: @json([
                'aside' => __('aside'),
                'about' => __('about'),
                'basic' => __('basic')
            ])
        };
    </script>
    @vite('resources/ts/app/main.tsx')
</head>
<body>
    <div id="app"></div>
</body>
</html>
