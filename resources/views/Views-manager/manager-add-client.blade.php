<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <script rel="stylesheet" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/addClientRadio.js') }}"></script>


</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Clients.add-client-header')
    <div style="margin-left: 30%; margin-right:30%;">
        <div class="card card-body border-0 shadow mb-4">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h2 class="h5 mb-5 text-center mt-5" style="color: #47484e;">Informations générales</h2>

            <form method="POST" action="{{ route('clients/ajout-client') }}" enctype="multipart/form-data">
                @csrf
                <x-label for="accountTypeChoice" :value="__('Role de membre')" />
                <div id="AccTypeRadio">
                    <input id="MrRadio" name=clientGender type=radio value="Monsieur" required><label
                        for=TeleRadio>Monsieur</label>
                    <input id="MmeRadio" name=clientGender type=radio value="Madame"><label for=MmeRadio>Madame</label>
                </div>
                <div class="btn-toolbar mb-4 md-0 mt-2 ">
                    <div id="accTypeSelector" class="btn-group ms-2 ms-lg-3">
                        <button id="MrButton" type="button" class="btn btn-sm btn-outline-gray-600 ">Monsieur</button>
                        <button id="MmeButton" type="button" class="btn btn-sm btn-outline-gray-600">Madame</button>
                    </div>
                </div>

                <div>
                    <x-label for="clientName" :value="__('Nom complet de client')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientName"
                        class="block mt-1 w-full" type="text" name="clientName" :value="old('clientName')" required />
                </div>
                <div class="mt-4">
                    <x-label for="clientEmail" :value="__('Email')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientEmail"
                        class="block mt-1 w-full" type="email" name="clientEmail" :value="old('clientEmail')" required />
                </div>

                <div>
                    <x-label for="clientNumber" :value="__('Numéro de téléphone')" class="mt-4" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientNumber"
                        class="block mt-1 w-full" type="text" name="clientNumber" :value="old('clientNumber')"
                        required />
                </div>

                <div>
                    <x-label for="clientImage" :value="__('Photo')" class="mt-4" />
                    <input name="clientImage" id="clientImage" type="file">
                </div>
                <div>
                    <x-label for="clientCompany" :value="__('Entreprise')" class="mt-4" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCompany"
                        class="block mt-1 w-full" type="text" name="clientCompany" :value="old('clientCompany')"
                        required />
                </div>
                <div>
                    <x-label for="clientPosition" :value="__('Poste')" class="mt-4" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientPosition"
                        class="block mt-1 w-full" type="text" name="clientPosition" :value="old('clientPosition')"
                        required />
                </div>
                <div class="row align-items-center">

                    <h2 class="h5 mt-9 mb-4 text-center" style="color: #47484e;">Location</h2>
                    <div>
                        <x-label for="clientCountry" :value="__('Pays')" class="mt-4" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCountry"
                            class="block mt-1 w-full" type="text" name="clientCountry" :value="old('clientCountry')"
                            required />
                    </div>
                    <div>
                        <x-label for="clientCity" :value="__('Ville')" class="mt-4" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientCity"
                            class="block mt-1 w-full" type="text" name="clientCity" :value="old('clientCity')"
                            required />
                    </div>
                    <div>
                        <x-label for="clientAddress" :value="__('Addresse')" class="mt-4" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientAddress"
                            class="block mt-1 w-full" type="text" name="clientAddress" :value="old('clientAddress')"
                            required />
                    </div>
                    <div>
                        <x-label for="clientZip" :value="__('Zip code')" class="mt-4" />

                        <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="clientZip"
                            class="block mt-1 w-full" type="text" name="clientZip" :value="old('clientZip')" required />
                    </div>
                </div>
                <div type="submit" class="flex items-center justify-center mt-1 mr-5">
                    <x-button class="h-10 rounded mt-5">
                        {{ __('Ajouter Client') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <br style="user-select: none;">
</body>

</html>
