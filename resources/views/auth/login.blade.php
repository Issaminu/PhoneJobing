<x-guest-layout>

    <x-auth-card>

        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="ml-80 mb-14 w-20 h-20 fill-current text-gray-500" />
            </a>
            <div class="card shadow pb-6 mb-6"
                style="background-color: rgba(247, 247, 247, 0.911); width: 46rem; max-height:29rem; padding:1.5rem;">
                <h1 style="font-size:1.4rem; margin-bottom:1rem;">Veuillez utiliser les comptes démo suivants pour la
                    visualisation :</h1>
                <p><b class="mr-14">Manager: </b> manager@gmail.com | qwerqwer123</p>
                <p><b class="mr-4">Téléoperateur: </b> teleoperateur@gmail.com | qwerqwer123</p>
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

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi ') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-3">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Créer votre compte') }}
                </a>
            </div>

            <div class="flex items-center justify-center mt-3">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif
            </div>
            <div class="flex items-center justify-center mt-4" style="flex-direction: column;">
                <x-button style="width: 8rem; padding-left:1.5rem;">
                    Connexion
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
