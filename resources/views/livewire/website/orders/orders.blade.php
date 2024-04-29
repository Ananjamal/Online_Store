<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #a7f4d1;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-md-3 mt-3 text-center">
                                    <h1 class="display-4 text-black">My Orders</h1>
                                    {{-- @if (session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif --}}

                                </div>
                            </div>
                            <div class="card shadow-2-strong mb-5" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        @if ($orders->isEmpty())
                                            <div class="col-md-6 m-auto text-center">
                                                <p class="display-1">There Is No Orders Yet.</p>
                                            </div>
                                        @else
                                            <table class="table table-borderless mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center align-middle">Date</th>
                                                        <th scope="col" class="text-center align-middle">Order #</th>
                                                        <th scope="col" class="text-center align-middle">Name</th>
                                                        <th scope="col" class="text-center align-middle">Total Price
                                                        </th>
                                                        <th scope="col" class="text-center align-middle">Details</th>
                                                        <th scope="col" class="text-center align-middle">Status</th>
                                                        <th scope="col" class="text-center align-middle">Cancel order
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($orders as $item)
                                                        <tr>
                                                            <td class="text-center align-middle">{{ $item->created_at }}
                                                            </td>
                                                            <td class="text-center align-middle">{{ $item->id }}
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                {{ $item->adresses->firstname }}</td>
                                                            <td class="text-center align-middle">
                                                                $ {{ $item->total_price }}
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <a href="{{ route('orders_details', [$item->id]) }}"
                                                                    class="btn btn-info btn-sm">
                                                                    <i class="fa-solid fa-circle-info"></i> </a>

                                                            </td>
                                                            <td class="text-center align-middle">
                                                                @if ( $item->order_status  == "pending")
                                                                <span class="badge badge-pill badge-warning"
                                                                    style="font-size:17px;">
                                                                    {{ $item->order_status }}
                                                                </span>
                                                                @elseif( $item->order_status  == "cancelled")
                                                                <span class="badge badge-pill badge-danger"
                                                                    style="font-size:17px;">
                                                                    {{ $item->order_status }}
                                                                </span>
                                                                @elseif( $item->order_status  == "delivered")
                                                                <span class="badge badge-pill badge-success"
                                                                    style="font-size:17px;">
                                                                    {{ $item->order_status }}
                                                                </span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <!-- Button trigger modal -->
                                                                <a wire:click='cancelOrder({{ $item->id }})'
                                                                    class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                                    data-bs-target="#cancelOrder">
                                                                    <i class="fas fa-times"></i>
                                                                </a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="cancelOrder" tabindex="-1" aria-labelledby="deleteItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="cancelOrder">Cancel Order</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                    </div>
                @endif
                @if ($order_id)
                    @livewire('website.orders.cancel-order', [$order_id])
                @endif
            </div>
        </div>
    </div>
</div>
