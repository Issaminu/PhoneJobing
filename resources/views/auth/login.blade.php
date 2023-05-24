<x-guest-layout>

    <x-auth-card>

        <x-slot name="logo">
                <a href="/" class="logocontainer" style="display:flex; justify-content: center;">
                    <x-application-logo class="fill-current logo" style="max-width:10rem;" />
                </a>
            <div class="pb-6 mb-6 shadow card" style="background-color: rgba(247, 247, 247, 0.911); max-height:29rem; padding:1.5rem;">
                <h1 style="font-size:1.4rem; margin-bottom:1rem;">Veuillez utiliser les comptes démo suivants pour la
                    visualisation :</h1>
                <p><b class="mr-14">Manager: </b> manager@gmail.com | qwerqwer123</p>
                <p><b class="mr-4">Téléoperateur: </b> teleoperateur@gmail.com | qwerqwer123</p>
                <p style="margin-top: 2rem; font-weight: 600; color: #F5A524; text-align: center;">Veulliez noter que c'est impossible d’ajouter ou de modifier les données dans les comptes démo.</p>
                <p style="text-align: center;"><a href="/register" style="font-weight: 500; color: #F5A524; text-decoration: underline;">Créez un compte pour tester pleinement l’application.</a></p>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi ') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-3">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Créer votre compte') }}
                </a>
            </div>

            <div class="flex items-center justify-center mt-3">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
                @endif
            </div>
            <div class="flex items-center justify-center mt-4" style="flex-direction: column;">
                <x-button style="width: 8rem;">Connexion</x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
