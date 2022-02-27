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
    <script src="{{ asset('js/AccountTypeSelection.js') }}"></script>
    {{-- <link rel="stylesheet" href="croppie.css" />
    <script src="croppie.js"></script> --}}

</head>

<body>
    @include('layouts.navigation')
    @include('layouts.Equipe.team-add-member-header')
    <div style="margin-left: 30%; margin-right:30%;">
        <div class="card card-body border-0 shadow mb-4">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('/equipe/ajout-membre') }}" enctype="multipart/form-data">
                @csrf

                <!-- Type de Compte de nouveau membre -->
                <x-label for="accountTypeChoice" :value="__('Role de membre *')" />
                <div id="AccTypeRadio">
                    <input id="TeleRadio" name=accountTypeChoice type=radio value="teleoperateur"
                        @if (old('accountTypeChoice')) checked @endif required><label
                        for=TeleRadio>Téléoperateur</label>
                    <input id="CommRadio" name=accountTypeChoice type=radio value="commercial"
                        @if (old(!'accountTypeChoice')) checked @endif><label for=CommRadio>Commercial</label>
                </div>
                <div class="btn-toolbar mb-4 md-0 mt-2 ">
                    <div id="accTypeSelector" class="btn-group ms-2 ms-lg-3 ">
                        <button id="AccTypeTeleButton" type="button" class="btn btn-sm btn-outline-gray-600"
                            style="width: 17.62rem;">Téléoperateur</button>
                        <button id="AccTypeCommButton" type="button" class="btn btn-sm btn-outline-gray-600"
                            style="width: 17.62rem;">Commercial</button>
                    </div>
                </div>

                <!-- Name -->
                <div class="mt-2">
                    <x-label for="name" :value="__('Nom complet de membre *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="name"
                        class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="email"
                        class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Phone -->
                <div class="mt-4">
                    <x-label for="phone" :value="__('Numéro de téléphone *')" style="margin-top:1rem;" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="phone"
                        class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Mot de passe *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="password"
                        class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirmer la mot de passe *')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="password_confirmation"
                        class="block mt-1 mb-5 w-full" type="password" name="password_confirmation" required />
                </div>
                {{-- Image Upload --}}
                <div>
                    <x-label for="memberImage" :value="__('Photo *')" class="mt-4" />
                    <input name="memberImage" id="memberImage" type="file"
                        accept="image/png, image/jpeg, image/jpg, image/svg, image/webp" required>
                </div>

                <!-- Country -->
                <div class="mt-5">
                    <x-label for="country" :value="__('Pays')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="country"
                        class="block mt-1 w-full" type="text" name="country" :value="old('country')" />
                </div>
                <!-- City -->
                <div class="mt-4">
                    <x-label for="city" :value="__('Ville')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="city"
                        class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                </div>
                <!-- Address -->
                <div class="mt-4">
                    <x-label for="address" :value="__('Addresse')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="address"
                        class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
                </div>
                <!-- Zip -->
                <div class="mt-4">
                    <x-label for="zip" :value="__('Zip code')" />

                    <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="zip"
                        class="block mt-1 w-full" type="text" name="zip" :value="old('zip')" />
                </div>

                <div type="submit" class="flex items-center justify-center mt-5 mr-5">
                    <x-button class="h-10 rounded">
                        {{ __('Ajouter Membre') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <br>
</body>

</html>
