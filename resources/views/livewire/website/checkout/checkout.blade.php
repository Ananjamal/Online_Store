<div>
    {{-- Do your work, then step back. --}}
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input wire:model='firstname' class="form-control" type="text" placeholder="John">
                            @error('firstname')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input wire:model='lastname' class="form-control" type="text" placeholder="Doe">
                            @error('lastname')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input wire:model='email' class="form-control" type="email"
                                placeholder="example@email.com">
                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input wire:model='phone' class="form-control" type="number" placeholder="+123 456 789">
                            @error('phone')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input wire:model='address_line1' class="form-control" type="text"
                                placeholder="123 Street">
                            @error('address_line1')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input wire:model='address_line2' class="form-control" type="text"
                                placeholder="123 Street">
                            @error('address_line2')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select wire:model='country' class="custom-select">
                                <option selected>Palestine</option>
                                <option>United States</option>

                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                            @error('country')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input wire:model='city' class="form-control" type="text" placeholder="New York">
                            @error('city')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input wire:model='state' class="form-control" type="text" placeholder="New York">
                            @error('state')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input wire:model='zip_code' class="form-control" type="text" placeholder="123">
                            @error('zip_code')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>

                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" wire:model='paymentMethod'
                                        for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" wire:model='paymentMethod'
                                        name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" wire:model='paymentMethod'
                                        name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                            @error('paymentMethod')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-footer border-secondary bg-transparent">
                            <button wire:click='placeOrder'
                                class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place
                                Order</button>
                        </div>

                    </div>
                </div>



            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        {{-- @foreach ($cartItems as $item)
                            <div class="d-flex justify-content-between">
                                <p>{{ $item->product->name}}</p>
                                <p>${{ $item->quantity}}</p>
                                <p>${{ $item->total}}</p>
                            </div>
                        @endforeach --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="">Name</th>
                                    <th scope="col" class="text-center align-middle">quantity</th>
                                    <th scope="col" class="text-center align-middle">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItem as $item)
                                    <tr>
                                        <th scope="row" class="">{{ $item->product->name }}</th>
                                        <td class="text-center align-middle">{{ $item->quantity }}</td>
                                        <td class="text-center align-middle">${{ $item->total }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ $subtotal }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{ $totalprice }}</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Checkout End -->
</div>
