<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='csrf-token' content="{{ csrf_token() }}">

        <title>Voting App SMKN 1 Jakarta</title>

        <!-- Icons -->
        <link rel='stylesheet'
            href='https://cdn-uicons.flaticon.com/2.6.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-['Nunito']">
        @include('layouts.nav')
        @yield('content')
        <script>
            setInterval(() => {
                const hasVoteOsis = JSON.parse(localStorage.getItem('hasVoteOsis'));
                const hasVoteMpk = JSON.parse(localStorage.getItem('hasVoteMpk'));
                const osisExpiredTime = hasVoteOsis?.expired;
                const mpkExpiredTime = hasVoteMpk?.expired;
                const now = Date.now();

                if (hasVoteOsis && (now > osisExpiredTime)) localStorage.removeItem('hasVoteOsis');
                if (hasVoteMpk && (now > mpkExpiredTime)) localStorage.removeItem('hasVoteMpk');
            }, 1000);
        </script>
    </body>

</html>
