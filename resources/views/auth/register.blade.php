<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h4 class="text text-center">Foodies Register</h4>
        
        <!-- Name -->
        <div class="mb-3">
            <x-input-label for="name" :value="__('Name')" class="form-label" />
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-1 text-danger small" />
        </div>

        <!-- Email -->
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
        </div>

        <!-- Phone Number (Bago) -->
        <div class="mb-3">
            <x-input-label for="phone" :value="__('Phone Number')" class="form-label" />
            <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-1 text-danger small" />
        </div>

        <!-- Address (Bago) -->
        <div class="mb-3">
            <x-input-label for="address" :value="__('Address')" class="form-label" />
            <textarea id="address" class="form-control" name="address" rows="2" autocomplete="street-address">{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-1 text-danger small" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" class="form-label" />
            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger small" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
            <x-text-input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger small" />
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4">
            <a class="text-secondary small text-decoration-none link-primary" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="bg-primary rounded-3">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>