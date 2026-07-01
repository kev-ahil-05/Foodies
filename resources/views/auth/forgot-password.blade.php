<x-guest-layout>
    <div class="mb-3 small text-secondary">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <x-auth-session-status class="mb-3 alert alert-success" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" class="form-label" />
            
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger small" />
        </div>

        <div class="d-flex align-items-center justify-content-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>