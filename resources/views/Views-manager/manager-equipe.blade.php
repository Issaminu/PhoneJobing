<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script rel="stylesheet" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        let TeleState = 0,
            CommState = 0;

        window.onload = function() {
            window.FilterByTeleButton = document.getElementById('FilterByTeleButton').onclick = function() {
                if (TeleState == 0) {
                    document.getElementById("FilterByTeleButton").style.backgroundColor = "#1f2937";
                    document.getElementById("FilterByTeleButton").style.color = "#f2f4f6";
                    document.getElementById("FilterByCommButton").style.backgroundColor = "#f2f4f6";
                    document.getElementById("FilterByCommButton").style.color = "#4b5563";
                    FilterTeamTable("Téléoperateur");
                    TeleState = 1;
                    CommState = 0;
                    Type = "Téléoperateur";
                    document.getElementById('teamSearch').dispatchEvent(new KeyboardEvent('keyup', {
                        'key': document.getElementById('teamSearch').value
                    }));

                } else {
                    if (TeleState == 1) {
                        document.getElementById("FilterByTeleButton").style.backgroundColor = "#f2f4f6";
                        document.getElementById("FilterByTeleButton").style.color = "#4b5563";

                        FilterTeamTable(" ");
                        TeleState = 0;
                        CommState = 0;
                        document.getElementById('teamSearch').dispatchEvent(new KeyboardEvent('keyup', {
                            'key': document.getElementById('teamSearch').value
                        }));
                    }
                }
            };

            window.FilterByCommButton = document.getElementById('FilterByCommButton').onclick = function() {
                if (CommState == 0) {
                    document.getElementById("FilterByCommButton").style.backgroundColor = "#1f2937";
                    document.getElementById("FilterByCommButton").style.color = "#f2f4f6";
                    document.getElementById("FilterByTeleButton").style.backgroundColor = "#f2f4f6";
                    document.getElementById("FilterByTeleButton").style.color = "#4b5563";
                    FilterTeamTable("Commercial");
                    CommState = 1;
                    TeleState = 0;
                    Type = "Commercial";
                    document.getElementById('teamSearch').dispatchEvent(new KeyboardEvent('keyup', {
                        'key': document.getElementById('teamSearch').value
                    }));
                } else {
                    if (CommState == 1) {
                        document.getElementById("FilterByCommButton").style.backgroundColor = "#f2f4f6";
                        document.getElementById("FilterByCommButton").style.color = "#4b5563";

                        FilterTeamTable(" ");
                        CommState = 0;
                        TeleState = 0;
                        document.getElementById('teamSearch').dispatchEvent(new KeyboardEvent('keyup', {
                            'key': document.getElementById('teamSearch').value
                        }));
                    }
                }
            };
            window.searchTeamTable = document.getElementById('teamSearch').onkeyup = function() {
                let myType = " ";
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("teamSearch");
                filter = input.value.toUpperCase();
                table = document.getElementById("teamTable");
                tr = table.getElementsByTagName("tr");
                if (TeleState === 1) {
                    myType = "Téléoperateur";
                    FilterTeamTable(myType);
                } else if (CommState === 1) {
                    myType = "Commercial";
                    FilterTeamTable(myType);
                };
                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    if (!(event.key === "Backspace") && tr[i].style.display == "none") {
                        continue;
                    }
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (myType === "Commercial" || myType === "Téléoperateur") {
                            if (txtValue.toUpperCase().indexOf(filter) > -1 && tr[i].getElementsByTagName("td")[3]
                                .innerText === myType) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        } else {
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                        }
                    }
                }
            };
            window.FilterTeamTable = function(AccType) {
                var input, filter, table, tr, td, i, txtValue;
                filter = AccType.toUpperCase();
                table = document.getElementById("teamTable");
                tr = table.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[3];
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
            document.getElementById('FilterByTeleButtonClicked').onclick = function() {
                document.getElementById("FilterByTeleButtonClicked").style.backgroundColor = "#FFFF";
                document.getElementById("FilterByTeleButtonClicked").style.color = "#4b5563";
                document.getElementById("FilterByCommButtond").style.backgroundColor = "#FFFF";
                document.getElementById("FilterByCommButton").style.color = "#4b5563";
                // document.getElementById("FilterByTeleButtonClicked").id = "FilterByTeleButton";
                document.getElementById("FilterByTeleButtonClicked").setAttribute("id", "FilterByTeleButton");
            };

            document.getElementById('FilterByCommButtonClicked').onclick = function() {
                document.getElementById("FilterByCommButtonClicked").style.backgroundColor = "#FFFF";
                document.getElementById("FilterByCommButtonClicked").style.color = "#4b5563";
                document.getElementById("FilterByTeleButton").style.backgroundColor = "#FFFF";
                document.getElementById("FilterByTeleButton").style.color = "#4b5563";
                // document.getElementById("FilterByCommButtonClicked").id = "FilterByCommButton";
                document.getElementById("FilterByCommButtonClicked").setAttribute("id", "FilterByCommButton");

            };
        }
    </script>
</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Equipe.team-header')
    @include('layouts.Equipe.team-table')
    <br style="user-select: none;">
    <br style="user-select: none;">

</html>
