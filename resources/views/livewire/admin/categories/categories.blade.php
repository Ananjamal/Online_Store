<div id="main" class="main">

    <div
        class="pt-4 pb-3 bg-gradient-primary shadow-primary border-radius-lg d-flex justify-content-between align-items-center">
        <h2 class="text-dark text-capitalize ps-5 text-center">Categories Table</h2>

        <h4>

            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                Add Category
            </button>
        </h4>
    </div>

    <br>


    <!-- Table with hoverable rows -->

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">#</th>
                <th scope="col" class="text-center align-middle">Name</th>
                <th scope="col" class="text-center align-middle">Description</th>
                <th scope="col" class="text-center align-middle">Image</th>
                <th scope="col" class="text-center align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <th scope="row" class="text-center align-middle">{{ $item->id }}</th>
                    <td class="text-center align-middle">{{ $item->name }}</td>
                    <td class="text-center align-middle">{{ $item->description }}</td>
                    <td class="text-center align-middle">
                        <span class="text-xs text-secondary font-weight-bold">
                            <img class="text-center align-middle" src="{{ Storage::url($item->image) }}" height="100"
                                width="100" alt="category">
                        </span>
                    </td>
                    <td class="text-center align-middle">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updateCategoryModal" wire:click="edit_category({{ $item->id }})">
                            Edit
                        </button>

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DeleteCategoryModal" wire:click="delete_category({{ $item->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $categories->links('pagination-view') }}

    <!-- End Table with hoverable rows -->

    <!-- Create Category Modal -->
    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Category</h5>
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
                @livewire('admin.categories.create')
            </div>
        </div>
    </div>
    <!-- End Create Category Modal-->
    <!-- Update Category Modal -->
    <div wire:ignore.self class="modal fade" id="updateCategoryModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
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
                @if ($category_id)
                    @livewire('admin.categories.edit', [$category_id])
                @endif
            </div>
        </div>
    </div>
    <!-- End Update Category Modal-->
    <!-- Delete Category Modal -->
    <div wire:ignore.self class="modal fade" id="DeleteCategoryModal" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
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
                @if ($category_id)
                    @livewire('admin.categories.delete', [$category_id])
                @endif
            </div>
        </div>
    </div>
    <!-- End Delete Category Modal-->

    {{--
    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="addCategoryModal">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @livewire('admin.categories.create')
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($category_id)
                    @livewire('admin.categories.edit', [$category_id])
                @endif
            </div>
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if ($category_id)
                    @livewire('admin.categories.delete', [$category_id])
                @endif
            </div>
        </div>
    </div> --}}



</div>
