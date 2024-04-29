<div id="main" class="main">
    {{-- Be like water. --}}
    <div class="container">
        <h1 class="mt-5">Message List</h1>
        <div class="row">
            <div class="col">
                <ul class="list-group mt-3">
                    @foreach ($msgs as $item)
                        <li class="list-group-item message-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-3">
                                    <strong>From:</strong> {{ $item->name }}
                                </div>
                                <div class="col-md-3">
                                    <strong>Subject:</strong> {{ $item->subject }}
                                </div>
                                <div class="col-md-3">
                                    <strong>Date:</strong> {{ $item->created_at }}
                                </div>
                                <div class="col-md-3">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#updateCategoryModal"
                                        wire:click="showMessage({{ $item->id }})">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    {{-- {{$msgs->links()}} --}}
                </ul>
                <!-- Update Category Modal -->
                <div wire:ignore.self class="modal fade" id="updateCategoryModal" tabindex="-1"
                    data-bs-backdrop="false">
                    <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered class -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Message :</h5>
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
                            @if ($msg_id)
                                @livewire('admin.messages.messages-details', [$msg_id])
                            @endif
                        </div>
                    </div>
                </div>

                <!-- End Update Category Modal-->
            </div>
        </div>
    </div>
</div>
