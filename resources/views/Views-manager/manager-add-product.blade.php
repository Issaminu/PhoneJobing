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

</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Products.add-product-header')
    <x-guest-layout id="addMemberInfo">
        <x-add-member-card>
            <x-slot name="logo">
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('/produits/ajout-produit') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="prodName" :value="__('Nom de produit *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodName"
                        class="block mt-1 mb-3 w-full" type="text" name="prodName" :value="old('prodName')" required
                        autofocus />
                </div>
                <div>
                    <x-label for="prodPrice" :value="__('Prix *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodPrice"
                        class="block mt-1 mb-3 w-full" type="text" name="prodPrice" :value="old('prodPrice')" required />
                </div>
                <div>
                    <x-label for="prodQuantity" :value="__('Stock *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="prodQuantity"
                        class="block mt-1 mb-10 w-full" type="text" name="prodQuantity" :value="old('name')" required />
                </div>
                <div type="submit" class="flex items-center justify-center mt-1 mr-5 mb-3">
                    <x-button class="h-10 rounded">
                        {{ __('Ajouter Produit') }}
                    </x-button>
                </div>
            </form>
        </x-add-member-card>
    </x-guest-layout>
    <br>
</body>

</html>
