<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('pdf.resume')</title>
</head>
<body>
<table style="border-collapse: collapse;" cellspacing="6">
    <tr>
        <td align="C">
            <h2>@lang('pdf.resume')</h2>
            <h1>Test Name</h1>
        </td>
        <td align="C">
            <img src="/var/www/html/public/storage/profile_photos/test.jpg" alt="photo" border="0" width="250" align="middle">
        </td>
    </tr>
    <tr>
        <td>
            <p>phone:</p>
            <p>e-mail:</p>
            <p>resource1:</p>
            <p>resource2:</p>
        </td>
        <td>
            <p>Land:</p>
            <p>City:</p>
            <p>Address:</p>
            <p>PLZ:</p>
        </td>
    </tr>
</table>
</body>
</html>
