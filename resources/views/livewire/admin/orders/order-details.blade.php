<div >
    {{-- Be like water. --}}
    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="px-4 py-5 card-header">
                            <h5 class="mb-0 text-muted"> Order,
                                 <span
                                    style="color: #a8729a;">{{ $username }}
                                </span>!
                            </h5>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
