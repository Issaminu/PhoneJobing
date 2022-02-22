
let TeleState = 0,
    CommState = 0;

window.onload = function () {
    window.FilterByTeleButton = document.getElementById('FilterByTeleButton').onclick = function () {
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

    window.FilterByCommButton = document.getElementById('FilterByCommButton').onclick = function () {
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
    window.searchTeamTable = document.getElementById('teamSearch').onkeyup = function () {
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
    window.FilterTeamTable = function (AccType) {
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
}