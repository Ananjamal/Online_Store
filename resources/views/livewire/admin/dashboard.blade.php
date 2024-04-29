<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @livewire('admin.sidebar')
    @livewire('admin.navbar')

    @if ($categories)
        @livewire('admin.categories.categories')
    @elseif ($products)
        @livewire('admin.products.products')
    @elseif ($orders)
        @livewire('admin.orders.orders')
    @elseif ($messages)
        @livewire('admin.messages.messages')
    @else
        @livewire('admin.main')
    @endif


</div>
