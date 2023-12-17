{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
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
            @if (session('failed'))
                <div class="alert alert-warning alert-dismissible fade " role="alert">
                    <strong>{{ session('failed') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <header>WELCOME TO ARC</header>
            <form method="POST" action="{{ route('sign-Up.process') }}">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="name" required placeholder="Name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="email" name="email" required placeholder="Email ">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field space">
                    <span class="fa fa-phone"></span>
                    <input type="number" step="any" name="phone" required placeholder="Phone">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="pass-key-reg" required placeholder="Password">
                    <span class="show-reg ">SHOW</span>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password_confirmation" class="pass-key-reg" required placeholder="Confirm Password">
                    <span class="show-reg">SHOW</span>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pass">
                    {{-- <a href="{{ route('login') }}">Already registered?</a> --}}
                </div>
                <div class="field">
                    <input type="submit" value="Register">
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
                Already registered?
                <a href="{{ route('login') }}">Login Now</a>
            </div>
        </div>
    </div>
    <script>
        const pass_field = document.querySelector('.pass-key-reg');
        const showBtn = document.querySelector('.show-reg');
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
