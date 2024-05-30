<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('pdf.resume')</title>
</head>
<body>
    <table style="border-collapse: collapse;" cellspacing="15">
        <tr>
            <td align="C">
                <p style="font-size: 24px;">@lang('pdf.resume')</p>
                <p style="font-size: 24px;">{{ $resources }}</p>
            </td>
            <td align="C">
                <img src="{{ $photo ?? '' }}" alt="@lang('resume_photo')" border="0" height="250" align="middle">
            </td>
        </tr>
        <tr>
            <td>
                <p>@lang('pdf.phone'): {{ $phone ?? '' }}</p>
                <p>@lang('pdf.email'): {{ $email ?? '' }}</p>
                @if($resources)
                    @foreach($resources as $resource)
                        <label for="{{ $resource['name'] }}"></label><p id="{{ $resource['name'] }}">{{ $resource['data'] }}</p>
                    @endforeach
                @endif
            </td>
            <td>
                <p>@lang('pdf.country'): {{ $country ?? '' }}</p>
                <p>@lang('pdf.city'): {{ $city ?? '' }}</p>
                <p>@lang('pdf.address'): {{ $address ?? '' }}</p>
                <p>@lang('pdf.zip'): {{ $zip ?? '' }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
