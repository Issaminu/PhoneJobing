<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/searchAndFilterTeamTable.js') }}"></script>

</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Equipe.team-header')

    @include('layouts.Equipe.team-table')

    <br style="user-select: none;">
    <br style="user-select: none;">

</html>
