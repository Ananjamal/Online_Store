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
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="ms-2 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                <br>
                <a class="ms-2 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('Dont Have An Acount?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assetsDash/img/zay.png') }}" rel="icon" sizes="192x192">
    <link href="{{ asset('assetsDash/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assetsDash/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsDash/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assetsDash/css/style.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    @livewireStyles
</head>

<body>


    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ route('dashboard') }}">
                                <img src="{{ asset('assetsDash/img/zay.png') }}" height="80px" width="80px"
                                    alt="">
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                </div>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                {{-- <form class="row g-3 needs-validation" novalidate> --}}
                                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation">
                                    @csrf
                                    <div class="col-12">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />

                                        <label for="yourUsername" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" id="yourUsername"
                                                required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />

                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <div class="invalid-feedback">Please enter your password!</div>

                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                value="true" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="col-12">
                                            <a href="{{ route('register') }}">Don't have account?</a>
                                        </div>
                                        <div class="col-12">
                                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assetsDash/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assetsDash/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assetsDash/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @livewireScripts
</body>

</html>

