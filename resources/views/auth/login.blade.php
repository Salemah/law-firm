{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    @php
        $dashboard_settings = \Illuminate\Support\Facades\DB::table('dashboard_settings')->first();
    @endphp
    <meta charset="utf-8">
    <title>WELCOME TO ARC</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="icon"
        href="@if ($dashboard_settings) {{ asset('image/dashboard/' . $dashboard_settings->favicon) }} @else {{ asset('image/AdminLTELogo.png') }} @endif "
        type="image/x-icon">
</head>

<body>
    <div class="bg-img">
        <div class="content">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade " role="alert">
                    <strong style="color: rgb(255, 255, 255)"> {{ session('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-warning alert-dismissible fade  " role="alert">
                    <strong style="color: red">{{ session('failed') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <header>WELCOME TO ARC</header>
            <form method="POST" action="{{ route('sign-in.process') }}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" name="email" required placeholder="Email or Phone">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="pass-key" required placeholder="Password">
                    <span class="show">SHOW</span>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pass">
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" value="LOGIN">
                </div>
            </form>
            {{-- <div class="login">
               Or login with
            </div>
            <div class="links">
               <div class="facebook">
                  <i class="fab fa-facebook-f"><span>Facebook</span></i>
               </div>
               <div class="instagram">
                  <i class="fab fa-instagram"><span>Instagram</span></i>
               </div>
            </div> --}}
            <div class="signup " style="margin-top: 1rem">
                Don't have account?
                <a href="{{ route('register') }}">Signup Now</a>
            </div>
        </div>
    </div>
    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                showBtn.textContent = "HIDE";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                showBtn.textContent = "SHOW";
                showBtn.style.color = "#222";
            }
        });
    </script>
</body>

</html>
