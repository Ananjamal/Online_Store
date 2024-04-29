<div>
    {{-- Be like water. --}}
    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="px-4 py-5 card-header">
                            <h5 class="mb-0 text-muted">Your Order, <span
                                    style="color: #a8729a;">{{ $username }}</span>!</h5>
                        </div>
                        <div class="p-4 card-body">

                            @foreach ($orderproducts as $item)
                                <div class="mb-4 border card shadow-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div
                                                class="text-center col-md-2 d-flex justify-content-center align-items-center">
                                                <p class="mb-0 text-muted small"> # {{ $counter++ }}</p>
                                            </div>
                                            <div class="col-md-2">
                                                <img src="{{ Storage::url($item->product->image) }}" class="img-fluid"
                                                    alt="Phone">
                                            </div>
                                            <div
                                                class="text-center col-md-2 d-flex justify-content-center align-items-center">
                                                <p class="mb-0 text-muted">{{ $item->product->name }}</p>
                                            </div>

                                            <div
                                                class="text-center col-md-2 d-flex justify-content-center align-items-center">
                                                <p class="mb-0 text-muted small"> ${{ $item->product->price }}</p>
                                            </div>
                                            <div
                                                class="text-center col-md-2 d-flex justify-content-center align-items-center">
                                                <p class="mb-0 text-muted small">Qty: {{ $item->quantity }}</p>
                                            </div>
                                            <div
                                                class="text-center col-md-2 d-flex justify-content-center align-items-center">
                                                <p class="mb-0 text-muted small">Total: ${{ $item->total }}</p>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endforeach


                            {{-- <div class="pt-2 d-flex justify-content-between">
                                <p class="mb-0 fw-bold">Order Details</p>
                                <p class="mb-0 text-muted"><span class="fw-bold me-4">Total</span> $898.00</p>
                            </div>

                            <div class="pt-2 d-flex justify-content-between">
                                <p class="mb-0 text-muted">Invoice Number : 788152</p>
                                <p class="mb-0 text-muted"><span class="fw-bold me-4">Discount</span> $19.00</p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="mb-0 text-muted">Invoice Date : 22 Dec,2019</p>
                                <p class="mb-0 text-muted"><span class="fw-bold me-4">GST 18%</span> 123</p>
                            </div>

                            <div class="mb-5 d-flex justify-content-between">
                                <p class="mb-0 text-muted">Recepits Voucher : 18KU-62IIK</p>
                                <p class="mb-0 text-muted"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
