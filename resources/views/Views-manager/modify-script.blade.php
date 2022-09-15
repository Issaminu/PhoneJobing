<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/translations/fr.js"></script>
    <style>
        .ck-editor__editable_inline {
            min-height: 40px;
        }

        div.ck.ck-editor__editable_inline * {
            all: revert;
        }
    </style>
</head>

<body>

    @include('layouts.navigation')
    @include('layouts.Scripts.scriptModify-header')
    @include('layouts.Scripts.scriptModify-body')


</body>

</html>
