<div>
    {{-- The Master doesn't talk, he acts. --}}
    <h1 class="pb-4 h2">Categories</h1>
    <ul class="list-unstyled templatemo-accordion">

        <li class="pb-3">
            @foreach ($categories as $category)
                <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#"
                    wire:click='showProducts({{ $category->id }})'>
                    {{ $category->name }}
                </a>
            @endforeach

            {{-- <ul class="pl-3 collapse show list-unstyled">

                <li><a class="text-decoration-none" wire:click='previewMen' href="#">Men</a></li>
                <li><a class="text-decoration-none" wire:click='previewWomen' href="#">Women</a></li>
            </ul> --}}
        </li>
        {{-- <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                Sale
                <i class="mt-1 pull-right fa fa-fw fa-chevron-circle-down"></i>
            </a>
            <ul id="collapseTwo" class="pl-3 collapse list-unstyled">
                <li><a class="text-decoration-none" href="#">Sport</a></li>
                <li><a class="text-decoration-none" href="#">Luxury</a></li>
            </ul>
        </li>
        <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                Product
                <i class="mt-1 pull-right fa fa-fw fa-chevron-circle-down"></i>
            </a>
            <ul id="collapseThree" class="pl-3 collapse list-unstyled">
                <li><a class="text-decoration-none" href="#">Bag</a></li>
                <li><a class="text-decoration-none" href="#">Sweather</a></li>
                <li><a class="text-decoration-none" href="#">Sunglass</a></li>
            </ul>
        </li> --}}
    </ul>
</div>
