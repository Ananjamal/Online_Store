<div>
    {{-- Success is as dangerous as failure. --}}
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="mt-5 col-lg-5">
                    <div class="mb-3 card">
                        <img class="card-img img-fluid" src="{{ Storage::url($product->image) }}" style="height: 414px; width: 100%; object-fit: fill  ;" alt="Card image cap"
                            id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="mt-5 col-lg-7">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                        </div>
                    @elseif (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            {{ session('error') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button> --}}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $product->name }}</h1>
                            <p class="py-2 h3">${{ $product->price }}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Category:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>{{ $product->category->name }}</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{ $product->description }}</p>





                            <div class="pb-3 row">
                                <div class="col d-grid">
                                    <button wire:click='addToCart({{ $product->id }})' class="btn btn-success btn-lg">
                                        Add To Cart
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->




</div>
