<x-guest-layout>
    <!-- Status Wrapper (Bootstrap: alert alert-success) -->
    <x-auth-session-status class="mb-4 p-4 text-sm text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-lg shadow-sm" :status="session('status')" />
    
    <!-- Title Header -->
    <h4 class="text-2xl font-bold text-center text-gray-900 mb-6">Foodies Login</h4>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
          
        <!-- Email Input Field Section -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="block text-sm font-bold text-gray-700 mb-1" />
            <!-- Pinalitan ang form-control -> w-full + padding + borders -->
            <x-text-input id="email" class="w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-150" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs font-semibold text-red-500" />
        </div>

        <!-- Password Input Field Section -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-bold text-gray-700 mb-1" />
            <x-text-input id="password" class="w-full px-4 py-2 text-sm bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-150"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs font-semibold text-red-500" />
        </div>

        <!-- Remember Me Checkbox Section -->
        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-400" name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600 cursor-pointer select-none">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Action Row (Forgot Password & Login Button) -->
        <div class="flex items-center justify-between mt-6 mb-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-500 hover:text-blue-600 transition-colors duration-150" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Custom styling para sa custom primary login component badge button -->
            <x-primary-button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-150">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Divider Line (Naitama rin ang sirang class name sa lumang code) -->
        <hr class="border-gray-200 my-4">

        <!-- Register Link Action Panel -->
        <div class="w-full">
            <a href="{{ route('register') }}" class="block w-full text-center bg-transparent hover:bg-emerald-50 text-emerald-600 hover:text-emerald-700 font-semibold py-2 px-4 border border-emerald-500 hover:border-emerald-600 rounded-md transition duration-150 text-sm shadow-sm">
                Click Register
            </a>
        </div>
    </form>
</x-guest-layout>

