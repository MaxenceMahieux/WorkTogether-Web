<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- FirstName -->
        <div class="mt-4">
            <x-input-label for="firstname" :value="__('firstname')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname"
                :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get("firstname")" class="mt-2" />
        </div>

        <!-- LastName -->
        <div class="mt-4">
            <x-input-label for="lastname" :value="__('lastname')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                :value="old('lastname')" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get("lastname")" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get("address")" class="mt-2" />
        </div>

        <!-- postalcode -->
        <div class="mt-4">
            <x-input-label for="postalcode" :value="__('postalcode')" />
            <x-text-input id="postalcode" class="block mt-1 w-full" type="number" name="postalcode"
                :value="old('postalcode')" required autofocus autocomplete="postalcode" />
            <x-input-error :messages="$errors->get("postalcode")" class="mt-2" />
        </div>

        <!-- city -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('city')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                :value="old('city')" required autofocus autocomplete="city" />
            <x-input-error :messages="$errors->get("city")" class="mt-2" />
        </div>

        <!-- country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('country')" />
            <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                :value="old('country')" required autofocus autocomplete="country" />
            <x-input-error :messages="$errors->get("country")" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
