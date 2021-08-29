<div>
    <div class="bg-blue-100 z-20 fixed w-full">
        <form wire:submit.prevent="update"  class="container mx-auto" wire::model="select_id">
            <label class="block">
            <span class="text-gray-700">Image</span>
            <input class="form-input mt-1 block w-full" type="file" wire:model="image">
            </label>
            @error('image')
            <span class="error">{{ $message }}</span>
            @enderror
            <label class="block">
                <span class="text-gray-700">Title</span>
                <input class="form-input mt-1 block w-full" type="text" wire:model="title" placeholder="title">
            </label>
            @error('title')
            <span class="error">{{ $message }}</span>
            @enderror
            <label class="block">
                <span class="text-gray-700">Alt</span>
                <input class="form-input mt-1 block w-full" type="text" wire:model="alt" placeholder="alt">
            </label>
            <label class="block">
                <span class="text-gray-700">Description</span>
                <textarea class="form-textarea mt-1 block w-full" rows="3" type="text" wire:model="description"
                          placeholder="description"></textarea>
            </label>
            <button type="submit">Save Photo</button>
        </form>
        <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
    </div>
</div>
