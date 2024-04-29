<div>
    {{-- Be like water. --}}
    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="container-fluid bg-light py-5">
                <div class="col-md-6 m-auto text-center">
                    <h1 class="h1"> Favorites</h1>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($favorites->isEmpty())
                <div class="row">
                    <div class="col-md-6 m-auto text-center">
                        <p>Your favorites list is empty.</p>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Image</th>
                                        <th class="text-center align-middle">Product Name</th>
                                        <th class="text-center align-middle">Unit Price </th>
                                        <th class="text-center align-middle">Add Item</th>
                                        <th class="text-center align-middle">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($favorites as $item)
                                        <tr>
                                            <td class="text-center align-middle" >
                                                <a href="{{ route('productDetails', ['id' => $item->product->id]) }}">
                                                    <img class="text-center align-middle"
                                                        src="{{ Storage::url($item->product->image) }}"
                                                        height="80" width="80" alt="" />
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="{{ route('productDetails', ['id' => $item->product->id]) }}">
                                                    {{ $item->product->name }}
                                                </a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <p>$ {{ $item->product->price }}
                                                </p>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a class="btn hvr-hover" href="#"
                                                    wire:click='add_to_cart({{ $item->product->id }})'>Add to
                                                    Cart</a>
                                            </td>
                                            <td class="text-center align-middle">
                                                <a href="#"
                                                    wire:click='delete_favorite_item({{ $item->product->id }})'>
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Wishlist -->
</div>
