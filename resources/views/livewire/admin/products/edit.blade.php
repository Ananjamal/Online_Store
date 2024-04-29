<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-info" style="text-align: center">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="modal-body">

        <div class="mb-3 input-container">
            <label class="text-dark">Product Name</label>
            <input type="text" wire:model.defer="name" class="form-control text-dark">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3 input-container">
            <label for="categories" class="text-dark">Choose a Category:</label>

            {{-- <select name="categories" id="categories" wire:model="category_id"> --}}
            <select class="custom-select form-control text-dark" id="categories" wire:model.defer="category_id">
                <option class="form-control text-dark"></option>
                @foreach ($categories as $category)
                    <option class="form-control text-dark" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3 input-container">
            <label class="text-dark">Product Price ($)</label>
            <input type="text" wire:model.defer="price" class="form-control text-dark">
            @error('price')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-dark">Description</label>
            <input type="text" class="form-control text-dark" name="description" wire:model.defer="description">
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" class="text-dark">Product Picture</label>
            <input type="file" wire:model="newImage" class="form-control text-dark">
            @if ($newImage)
                <label class="text-dark">Image Preview </label>

                <img src="{{ $newImage->temporaryUrl() }}" height="100" width="100">
            @elseif($product->image)
                <label class="text-dark">Image Preview </label>

                <img src="{{ Storage::url($product->image) }}" height="100" width="100" alt="Product Image">
            @endif
            @error('newImage')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div wire:loading wire:target="newImage">Uploading...</div>

        <div class="modal-footer">
            <button type="button" wire:click='refresh' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" wire:click="updateProduct" class="btn btn-primary">Save </button>
        </div>

    </div>
</div>
