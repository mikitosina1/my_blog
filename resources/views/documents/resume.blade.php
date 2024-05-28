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
<div>
    <div class="main left">
        <h3>Top 10 Skills</h3>
        <p>1</p>
        <p>2</p>
        <p>3</p>
        <p>4</p>
        <p>5</p>
        <p>6</p>
        <p>7</p>
        <p>8</p>
        <p>9</p>
        <p>10</p>
    </div>
    <div class="main right">
        <div class="connection">
            <label for="country"></label><p id="country"></p>
            <label for="city"></label><p id="city"></p>
            <label for="plz"></label><p id="plz"></p>
            <label for="phone"></label><p id="plz"></p>
        </div>
    </div>
</div>
<div></div>
</body>
</html>
