<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="modal-body">
        {{-- <p style="color: dark">Are you sure to delete the category?</p> --}}
        <h4 class="modal-title text-capitalize text-center" style="color: red"  >Are You Sure? </h4>

    </div>
    <div class="modal-footer">
        <button type="button" wire:click='refresh' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" wire:click="destroyProduct" class="btn btn-primary">Save </button>
    </div>
</div>
