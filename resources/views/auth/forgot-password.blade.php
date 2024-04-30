{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-flex justify-content-center py-4">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assetsDash/img/zay.png') }}" height="80px" width="80px" alt="">
                    </a>
                </div><!-- End Logo -->
                <div class="card">

                    <div class="card-body">

                        <h2 class="card-title text-center mb-4">Forgot Password</h2>
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control" id="email" placeholder="Enter email" type="email"
                                    name="email" :value="old('email')" required autofocus>
                                <small id="emailHelp" class="form-text text-muted">We'll send you a link to reset your
                                    password.</small>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
