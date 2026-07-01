<x-guest-layout>
    <x-auth-session-status class="mb-3 alert alert-success" :status="session('status')" />
        <h4 class="text text-center">Foodies Login</h4>
    <form method="POST" action="{{ route('login') }}">
        @csrf
          
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" class="form-label" />
            <x-text-input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger small" />
        </div>

        <div class="form-check mb-3">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label text-secondary small">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="d-flex align-items-center justify-content-between mt-4 mb-3 ">
            @if (Route::has('password.request'))
                <a class="text-secondary small text-decoration-none link-primary" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-primary rounded-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <hr class="text-mutedmy-3">

        <div class="d-grid">
            <a href="{{ route('register') }}" class="btn btn-outline-success btn-sm">Click Register</a>
        </div>
    </form>
</x-guest-layout>