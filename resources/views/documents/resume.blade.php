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
                <p style="font-size: 24px;">{{ $name }}</p>
            </td>
            <td align="C">
                <img src="{{ $photo ?? '' }}" alt="@lang('resume_photo')" border="0" height="250" align="middle">
            </td>
        </tr>
        <tr>
            <td>
                <p>@lang('pdf.phone'): {{ $phone ?? '' }}</p>
                <p>@lang('pdf.email'): {{ $email ?? '' }}</p>
                @if($additional)
                    @foreach($additional as $key => $resource)
                        <p>{{ $key }}: {{ $resource }}</p>
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

    {{--experience--}}
    <h1 align="center">@lang('pdf.experience')</h1>
    <table style="border-collapse: collapse;" cellspacing="15">
        <tr>
            <td width="140">
                <h2>@lang('pdf.skills')</h2>
                <ul>
                    @forelse($skills as $skill)
                        <li>{{ $skill }}</li>
                    @empty
                        <p></p>
                    @endforelse
                </ul>
            </td>
            <td width="400">
                @forelse($experience as $exp)
                    <h3>{{ $exp['title'] }}</h3>
                    <p>{{ $exp['description'] }}</p>
                @empty
                    <p></p>
                @endforelse
            </td>
        </tr>
    </table>

    {{--study--}}
    <h1 align="center">@lang('pdf.study')</h1>
    <table style="border-collapse: collapse;" cellspacing="15">
        <tr>
            <td width="140">
                <p></p>
            </td>
            <td width="400">
                @forelse($studying as $st)
                    <h2>{{ $st['title'] }}</h2>
                    <p>{{ $st['description'] }}</p>
                @empty
                    <p></p>
                @endforelse
            </td>
        </tr>
    </table>

    {{--certificates--}}
    <h1 align="center">@lang('pdf.certificates')</h1>
    <table style="border-collapse: collapse;" cellspacing="15">
        <tr>
            <td width="140">
                <p></p>
            </td>
            <td width="400">
                @forelse($certificates as $cert)
                    <h2>{{ $cert['title'] }}</h2>
                    <p>{{ $cert['description'] }}</p>
                    <hr width="50">
                @empty
                    <p></p>
                @endforelse
            </td>
        </tr>
    </table>
</body>
</html>
