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
    <script>
        function callSearch() {
            // Declare letiables
            let input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("productSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("callTable");
            tr = table.getElementsByTagName("tr");
            // Loop through all list items, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        };
    </script>
</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Historique.listAllAppels-header')
    @include('layouts.Historique.listAllAppels-body')

    <br style="user-select: none;">
    <br style="user-select: none;">
</body>

</html>
