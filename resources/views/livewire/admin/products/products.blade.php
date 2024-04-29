<div id="main" class="main">
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div
        class="pt-4 pb-3 bg-gradient-primary shadow-primary border-radius-lg d-flex justify-content-between align-items-center">
        <h2 class="text-dark text-capitalize ps-5 text-center">Product Table</h2>

        <h4>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>
        </h4>
    </div>

    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="text-center align-middle" scope="col">#</th>
                <th class="text-center align-middle" scope="col">Name </th>
                <th class="text-center align-middle" scope="col">Category</th>
                <th class="text-center align-middle" scope="col">Image</th>
                <th class="text-center align-middle" scope="col">Description</th>
                <th class="text-center align-middle" scope="col">Price</th>
                <th class="text-center align-middle" scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $item->id }}</th>
                    <td class="text-center align-middle">{{ $item->name }}</td>
                    <td class="text-center align-middle">{{ $item->category->name }}</td>

                    {{-- <td>{{ $item->image }}</td> --}}
                    <td class="text-center align-middle">
                        <span class="text-xs text-secondary font-weight-bold">
                            <img class="text-center align-middle" src="{{ Storage::url($item->image) }}" height="100"
                                width="100" alt="category">
                        </span>
                    </td>
                    <td class="text-center align-middle">{{ $item->description }}</td>
                    <td class="text-center align-middle">{{ $item->price }}$</td>

                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateProductModal" wire:click="edit_product({{ $item->id }})">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DeleteProductModal" wire:click="delete_product({{ $item->id }})">
                            Delete
                        </button>
                    </td>
                    {{-- <td><button wire:click='delete({{ $user->id }})'>Delete</button></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination-view') }}

    <!-- Create Category Modal -->
    <div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Product</h5>
                    <button wire:click='refresh' type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('message') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                @livewire('admin.products.create')
            </div>
        </div>
    </div>
    <!-- End Create Category Modal-->
    <!-- Update Category Modal -->
    <div wire:ignore.self class="modal fade" id="updateProductModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit product</h5>
                    <button type="button" wire:click='refresh' class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('message') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                @if ($product_id)
                    @livewire('admin.products.edit', [$product_id])
                @endif
            </div>
        </div>
    </div>
    <!-- End Update Category Modal-->
    <!-- Delete Category Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteProductModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Product</h5>
                    <button type="button" wire:click='refresh' class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('message') }}
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                    </div>
                @endif
                @if ($product_id)
                    @livewire('admin.products.delete', [$product_id])
                @endif
            </div>
        </div>
    </div>
    <!-- End Delete Category Modal-->




</div>
