<div>
    <form wire:submit.prevent="submit" class="modal-content modal-body border-0 p-0">
        <div class="input-group mb-2">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" id="inputModalSearch"
                name="q" placeholder="Search ...">
            <button type="submit" class="input-group-text bg-success text-light">
                <i class="fa fa-fw fa-search text-white"></i>
            </button>
        </div>
    </form>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group">
                    @if ($results && $results->isNotEmpty())
                        @foreach ($results as $item)
                            <li class="list-group-item">
                                <a href="{{route('productDetails',$item->id)}}" class="d-flex align-items-center">
                                    <span>{{ $item->name }}</span>
                                    <img src="{{ Storage::url($item->image) }}" class="ml-auto" height="50px" width="50px">
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">No results found</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>



</div>
