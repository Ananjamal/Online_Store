<div id="main" class="main">
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th>No#</th>
                <th>Date</th>
                <th>
                    <b>N</b>ame
                </th>
                <th>Total Price $</th>
                <th>details</th>
                <th>Status</th>

                <th>Completion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->adresses->firstname }}</td>
                    <td>{{ $item->total_price }}$</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('order_detail', [$item->id]) }}" class="btn btn-info">
                            <i class="bi bi-info-circle"></i>
                        </a>
                    </td>

                    <td class="text-center align-middle">
                        @if ($item->order_status == 'pending')
                            <span class="btn btn-primary" style="font-size:17px;">
                                {{ $item->order_status }}
                            </span>
                        @elseif($item->order_status == 'cancelled')
                            <span class="btn btn-danger" style="font-size:17px;">
                                {{ $item->order_status }}
                            </span>
                        @elseif($item->order_status == 'delivered')
                            <span class="btn btn-success" style="font-size:17px;">
                                {{ $item->order_status }}
                            </span>
                        @endif
                    </td>
                    <td class="text-center align-middle">
                        <!-- Button trigger modal -->
                        <button wire:click='completeOrder({{ $item->id }})' class="btn btn-success"
                            data-bs-toggle="modal" data-bs-target="#completeOrder">
                            <i class="bi bi-check-circle"></i>
                        </button>

                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    <div wire:ignore.self class="modal fade" id="completeOrder" tabindex="-1" aria-labelledby="deleteItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="completeOrder">Complete Order ?</h5>
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
                    @livewire('admin.orders.complete-order', [$order_id])
                @endif
            </div>
        </div>
    </div>
    <!-- End Table with stripped rows -->
</div>
