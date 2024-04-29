<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <i class="bx bxs-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href="#" wire:click='cat'>
                    <i class="bx bx-category"></i>
                    <span>Categories</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href="#" wire:click='prod'>
                    <i class="ri-product-hunt-fill"></i>
                    <span>Products</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link " href="#" wire:click='order'>
                    <i class="bx bxs-book-alt"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#" wire:click='messages'>
                    <i class="bx bxs-message-detail"></i>
                    <span>Messages</span>
                </a>
            </li><!-- End Dashboard Nav -->
       
        </ul>

    </aside><!-- End Sidebar-->
</div>
