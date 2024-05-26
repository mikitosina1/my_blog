<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('pdf.resume')</title>
</head>
<body>
<div class="header" style="display: flex; justify-content: center;">
    <div class="text" style="text-align: center;">
        <h2>@lang('pdf.resume')</h2>
        <h3>Test Name</h3>
    </div>
    <div class="photo">
        <img src="/var/www/html/public/storage/profile_photos/test.jpg" alt="img">
    </div>
</div>
<div></div>
<div></div>
</body>
</html>
