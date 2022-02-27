<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name *')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email *')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password *')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password *')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>
            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Numéro de téléphone *')" style="margin-top:1rem;" />

                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="phone"
                    class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>
            <!-- Company -->
            <div class="mt-4">
                <x-label for="company" :value="__('Entreprise *')" style="margin-top:1rem;" />

                <x-input style="box-shadow: rgba(156, 156, 156, 0.2) 0px 2px 8px 0px;" id="company"
                    class="block mt-1 w-full" type="text" name="company" :value="old('company')" required />
            </div>
            {{-- Image Upload --}}
            <div>
                <x-label for="managerImage" :value="__('Photo *')" class="mt-4" />
                <input name="managerImage" id="managerImage" type="file"
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
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
