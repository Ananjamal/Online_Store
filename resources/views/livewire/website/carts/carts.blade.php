<div>
    {{-- Stop trying to control. --}} <!-- Cart Start -->
    <div class="pt-5 container-fluid">

        <div class="row px-xl-5">
            <div class="mb-5 col-lg-8 table-responsive">
                <div class="m-auto text-center col-md-6">
                    <h1 class="h1"> Cart</h1>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($cartItem->isEmpty())
                    <div class="row">
                        <div class="m-auto text-center col-md-6">
                            <p>Your Cart list is empty.</p>
                        </div>
                    </div>
                @else
                    <table class="table mb-0 text-center table-bordered">
                        <thead class="bg-secondary text-dark">
                            <tr>
                                <th>Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($cartItem as $item)
                                <tr>
                                    <td class="align-middle"><img src="{{ Storage::url($item->product->image) }}"
                                            alt="" style="height: 90px; width: 90px; object-fit: fill  ;"> Colorful Stylish Shirt</td>
                                    <td class="align-middle">${{ $item->product->price }}</td>
                                    <td class="align-middle">
                                        <div class="mx-auto input-group quantity" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button wire:click='decreaseQuantity({{ $item->id }})' class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text"
                                                class="text-center form-control form-control-sm bg-secondary"
                                                value="{{ $item->quantity }}">
                                            <div class="input-group-btn">
                                                <button wire:click='increaseQuantity({{ $item->id }})'
                                                    class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">${{ $item->quantity * $item->product->price }}</td>
                                    <td class="align-middle">
                                        <button wire:click='remove_product_from_cart({{ $item->product->id }})'
                                            class="btn btn-sm btn-primary"><i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                @endif
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="p-4 form-control" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="mb-5 card border-secondary">
                    <div class="border-0 card-header bg-secondary">
                        <h4 class="m-0 font-weight-semi-bold">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="pt-1 mb-3 d-flex justify-content-between">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">${{ $subtotal }}</h6> <!-- Display the subtotal -->
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="bg-transparent card-footer border-secondary">
                        <div class="mt-2 d-flex justify-content-between">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{ $totalprice }}</h5>
                        </div>
                        <a class="py-3 my-3 btn btn-block btn-primary" href ="{{ route('checkout') }}">Proceed To
                            Checkout</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

</div>
