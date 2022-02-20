<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script rel="stylesheet" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.onload = function() {
            window.searchProductsTable = document.getElementById('productSearch').onkeyup = function() {
                // Declare letiables
                let input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("productSearch");
                filter = input.value.toUpperCase();
                table = document.getElementById("productTable");
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
            let exampleModal = document.getElementById('exampleModal')
            exampleModal.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                let button = event.relatedTarget
                let prodIdValue = button.getAttribute('prodId');
                let prodNameValue = button.getAttribute('prodName');
                let prodPriceValue = button.getAttribute('prodPrice');
                let prodQuantityValue = button.getAttribute('prodQuantity');
                let modalTitle = exampleModal.querySelector('.modal-title')
                let modalBodyInput = exampleModal.querySelector('.modal-body input')
                // modalTitle.textContent = 'Modifier ce produit' + prodNameValue
                document.getElementById('prodId').value = prodIdValue;
                document.getElementById('prodName').value = prodNameValue;
                document.getElementById('prodPrice').value = prodPriceValue;
                document.getElementById('prodQuantity').value = prodQuantityValue;
            })
        }
    </script>
</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Products.listAllProducts-header')
    @include('layouts.Products.listAllProducts-table')
    <br style="user-select: none;">
    <br style="user-select: none;">
    @include('layouts.Products.modify-product-popup')

</html>
