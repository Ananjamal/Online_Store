<div>
    <!-- Header -->
    <nav class="shadow navbar navbar-expand-lg navbar-light">
        <div class="container mr-0 d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('home') }}">
                Zay
            </a>

            <button class="border-0 navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a href="{{ route('my_orders') }}" class="nav-link">Orders</a>
                                </li>
                                @role('admin')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                                    </li>
                                @endrole
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log
                                        in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                                    </li>
                                @endif
                            @endauth
                        @endif

                    </ul>
                </div>

                <div class="navbar align-self-center d-flex">

                    <div class="pr-3 mt-3 mb-4 d-lg-none flex-sm-fill col-7 col-sm-auto">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a  class="nav-icon d-none d-lg-inline"
                        data-bs-toggle="modal" data-bs-target="#Search">
                        <i class="mr-2 fa fa-fw fa-search text-dark"></i>
                    </a>

                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('cart') }}">
                        <i class="mr-1 fa fa-fw fa-cart-arrow-down text-dark"></i>
                        <span
                            class="top-0 position-absolute left-100 translate-middle badge rounded-pill bg-light text-dark">
                            {{ $countCart }}</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('favorites') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        <span
                            class="top-0 position-absolute left-100 translate-middle badge rounded-pill bg-light text-dark">
                            {{ $countFavorites }}</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="{{ route('profile.edit') }}">
                        <i class="mr-3 fa fa-fw fa-user text-dark"></i>
                        {{-- <span
                            class="top-0 position-absolute left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    --}}
                    </a>
                </div>

            </div>

        </div>
    </nav>
    <!-- Close Header -->


    <div class="modal fade" id="Search" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-top">
            <div class="modal-content">

                <div class="modal-body">
                    <!-- Content goes here -->
                    @livewire('website.search')
                </div>
            </div>
        </div>
    </div>


</div>
