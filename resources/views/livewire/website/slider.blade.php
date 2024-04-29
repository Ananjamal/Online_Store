<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach ($products as $product)
                    <div class="container">
                        <div class="p-5 row">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                {{-- <img class="img-fluid" src="{{ Storage::url($product->image) }}" alt=""> --}}

                                <a href="{{ route('productDetails', $product->id) }}"><img
                                        src="{{ Storage::url($product->image) }}" class="card-img-top img-fluid"
                                        alt="..." style="height: 450px; width: 100%; object-fit: fill  ;"></a>
                            </div>
                            <div class="mb-0 col-lg-6 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><b>Zay</b> eCommerce</h1>
                                    <a href="{{ route('productDetails', $product->id) }}">
                                        <h3 class="h2">{{ $product->name }}</h3>
                                    </a>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- {{ $products->links('pagination-view') }} --}}

                <!-- Custom carousel controls with wire:click -->
                <a class="w-auto carousel-control-prev text-decoration-none ps-3" wire:click="previousSlide">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="w-auto carousel-control-next text-decoration-none pe-3" wire:click="nextSlide">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        <!-- End Banner Hero -->
    </div>
