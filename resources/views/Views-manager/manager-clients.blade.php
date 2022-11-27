<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clients</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/searchAndFilterTeamTable.js') }}"></script>

</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Clients.listAllClients-header')
    @include('layouts.Clients.listAllClients-body')
    <br style="user-select: none;">
    <br style="user-select: none;">
</body>

</html>
