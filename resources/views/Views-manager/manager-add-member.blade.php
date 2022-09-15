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
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
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
                        class="block mt-1 w-full" type="text" name="phone" value="{{ old('phone') ?? '+212' }}"
                        required />
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

                <!-- Assigned Clients -->
                <div class="mt-4">
                    <x-label for="clients" :value="__('Clients')" style="margin-top:1rem;" />
                    <input name='clients' value=''>
                    @include('layouts.Equipe.clientReserveTags')
                </div>


                <!-- Member Profile Photo -->
                <x-label for="memberImage" :value="__('Photo')" style="margin-top:1rem;" />

                <x-input type="file" style="display:none;" name="memberImage" class="file"
                    accept="image/png, image/jpeg, image/jpg, image/svg, image/webp" />
                <div class="input-group my-3">
                    <x-input id='memberImage' type="text" class="form-control"
                        style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px; border-color:#e5e7eb; border-top-left-radius:0.5rem; border-bottom-left-radius:0.5rem;"
                        disabled placeholder="Choisissez une image ..." id="file" />
                    <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary"
                            style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px; color: #fff; background-color: #1f2937;
                                border-color: #1f2937; border-top-left-radius:0rem; border-bottom-left-radius:0rem; height:3rem;">Uploader</button>
                    </div>
                </div>
                <script>
                    $(document).on("click", ".browse", function() {
                        var file = $(this).parents().find(".file");
                        file.trigger("click");
                    });
                    $('input[type="file"]').change(function(e) {
                        var fileName = e.target.files[0].name;
                        $("#file").val(fileName);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            // get loaded data and render thumbnail.
                            document.getElementById("preview").src = e.target.result;
                        };
                        // read the image file as a data URL.
                        reader.readAsDataURL(this.files[0]);
                    });
                </script>
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
