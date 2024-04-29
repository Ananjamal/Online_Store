<div>
   
    <div class="modal-body">

        <div class="mb-3 input-container">
            <label class="text-dark">Category Name</label>
            <input type="text" wire:model="name" class="form-control text-dark">
            @error('name')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="text-dark">Description </label>
            <textarea type="text" class="form-control text-dark" name="description" wire:model="description">

                   </textarea>
            @error('description')
                <small class="text-danger"> {{ $message }} </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1" class="text-dark">Category Picture</label>
            <input type="file" wire:model="image" class="form-control text-dark">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            @if ($image)
                <label class="text-dark">Image Preview </label>
                <img src="{{ $image->temporaryUrl() }}" height="100" width="100">
            @endif
        </div>
        <div wire:loading wire:target="image">Uploading...</div>


        <div class="modal-footer">
            <button type="button" wire:click='refresh' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" wire:click="store" class="btn btn-primary">Save </button>
        </div>

    </div>
</div>
