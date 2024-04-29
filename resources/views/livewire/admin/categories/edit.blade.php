<div>

    <div class="modal-body">

        <div class="mb-3 input-container">
            <label class="text-dark">Category Name</label>
            <input type="text" wire:model.defer="name" class="form-control text-dark">
            @error('name')
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
            <label for="exampleFormControlInput1" class="text-dark">Category Picture</label>
            <input type="file" wire:model="newImage" class="form-control text-dark">
            @if ($newImage)
                <label class="text-dark">Image Preview </label>

                <img src="{{ $newImage->temporaryUrl() }}" height="100" width="100">
            @elseif($category->image)
                <label class="text-dark">Image Preview </label>

                <img src="{{ Storage::url($category->image) }}" height="100" width="100" alt="Category Image">
            @endif
            @error('newImage')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div wire:loading wire:target="newImage">Uploading...</div>


        <div class="modal-footer">
            <button type="button" wire:click='refresh' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" wire:click="updateCategory" class="btn btn-primary">Save </button>
        </div>

    </div>
</div>
