<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Maesa System Camp Login</title>
    <!-- Add Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}" />

    {{-- for the fontawesome (icon) --}}
    <script src="https://kit.fontawesome.com/6cb8a8478d.js" crossorigin="anonymous"></script>
</head>

<body class="h-screen bg-gray-600 font-sans">
    <div class="flex justify-center items-center h-full">
        <div class="bg-gray-700 p-10 w-80 md:w-[450px] h-screen rounded-lg shadow-lg">
            <h1 class="text-yellow-400 text-3xl mb-2 drop-shadow-lg text-center shadow-indigo-500/50 text-shadow">Maesa</h1>
            <h4 class="text-sky-400 text-3xl mb-12 drop-shadow-lg text-center shadow-indigo-500/50 text-shadow">Camp System</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                
                <div class="mt-4 text-white justify-between text-sm ">
                    <!-- Email Address -->
                    <div class="mt-4 ">
                        <label for="email" class="pt-6 ">Username</label>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full text-black" placeholder="Username/Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <label for="password" class="pt-2 ">Password</label>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full text-black" placeholder="Password" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4 pt-10">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif

                    <x-primary-button class="ml-3 bg">
                        {{ __('Log in') }}
                    </x-primary-button>             
                </div>

                {{-- for register (delete if use it in live) --}}
                <a href="{{ route('register') }}" class="text-gray-200 hover:text-gray-900 position-absolute start-50 translate-middle-x mt-20">
                    Register
                </a>
            </form>
        </div>
    </div>
</body>

</html>
