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

            <x-primary-button class="ms-4">
                {{ __('Register') }}
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

                                <div class="pt-0 pb-0">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                </div>
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <form class="row g-3 needs-validation" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="col-12">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red"/>

                                        <label for="yourName" class="form-label">Your Name</label>
                                        <input type="text" name="name" class="form-control" id="yourName"
                                            required>

                                    </div>

                                    <div class="col-12">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />

                                        <label for="yourEmail" class="form-label">Your Email</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail"
                                            required>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />

                                    </div>
                                    <div class="col-12">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />

                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="yourPassword" required>

                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a
                                                href="{{ route('login') }}">Log
                                                in</a></p>
                                    </div>
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
