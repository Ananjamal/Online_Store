<div class="row">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row">
        {{-- <div class="col-md-6">
            <ul class="pt-1 pb-3 list-inline shop-top-menu">
                <li class="list-inline-item">
                    <a class="mr-3 h3 text-dark text-decoration-none" wire:click='previewAll'>All</a>

                </li>
                <li class="list-inline-item">

                    <a class="mr-3 h3 text-dark text-decoration-none" wire:click='previewMen'>Men's</a>

                </li>
                <li class="list-inline-item">

                    <a class="mr-3 h3 text-dark text-decoration-none" wire:click='previewWomen'>Women's</a>

                </li>
            </ul>
        </div> --}}
        {{-- <div class="pb-4 col-md-10">
            <div class="d-flex">
                <select class="form-control">
                    <option>Featured</option>
                    <option>A to Z</option>
                    <option>Item</option>
                </select>
            </div>
        </div> --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

    </div>
    @foreach ($products as $product)
        <div class="col-md-4">
            <div class="mb-4 card product-wap rounded-0">
                <div class="card rounded-0">
                    <img class="card-img rounded-0 img-fluid" src="{{ Storage::url($product->image) }}"
                        style="height: 250px; width: 100%; object-fit: fill  ;">
                    <div
                        class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                        <ul class="list-unstyled">
                            <li><a class="text-white btn btn-success" wire:click="addToFavorite({{ $product->id }})"><i
                                        class="far fa-heart"></i></a></li>
                            <li><a class="mt-2 text-white btn btn-success"
                                    href="{{ route('productDetails', ['id' => $product->id]) }}"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a wire:click="addToCart({{ $product->id }})"
                                    class="mt-2 text-white btn btn-success"><i class="fas fa-cart-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <a href="shop-single.html" class="h3 text-decoration-none">{{ $product->name }}</a>
                    <ul class="mb-0 w-100 list-unstyled d-flex justify-content-between">
                        <li>M/L/X/XL</li>
                        <li class="pt-2">
                            <span class="float-left ml-1 product-color-dot color-dot-red rounded-circle"></span>
                            <span class="float-left ml-1 product-color-dot color-dot-blue rounded-circle"></span>
                            <span class="float-left ml-1 product-color-dot color-dot-black rounded-circle"></span>
                            <span class="float-left ml-1 product-color-dot color-dot-light rounded-circle"></span>
                            <span class="float-left ml-1 product-color-dot color-dot-green rounded-circle"></span>
                        </li>
                    </ul>
                    <ul class="mb-1 list-unstyled d-flex justify-content-center">
                        <li>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-warning fa fa-star"></i>
                            <i class="text-muted fa fa-star"></i>
                            <i class="text-muted fa fa-star"></i>
                        </li>
                    </ul>
                    <p class="mb-0 text-center">${{ $product->price }}</p>
                </div>
            </div>
        </div>
    @endforeach
    {{ $products->links('pagination-view') }}

</div>
