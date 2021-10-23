<div>
    @if($createMode)
        <div class="bg-blue-100 z-20 fixed w-full">
            <form wire:submit.prevent="store" class="container mx-auto">
                <label class="block">
                    <span class="text-gray-700">Image</span>
                    <input class="form-input mt-1 block w-full" type="file" wire:model="image" placeholder="image">
                </label>
                @error('image')
                <span class="error">{{ $message }}</span>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Thumbnail</span>
                    <input class="form-input mt-1 block w-full" type="text" wire:model="thumb_name" placeholder="thumbnail">
                </label>
                @error('thumb_name')
                <span class="error">{{ $message }}</span>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Category_name</span>
                    <input class="form-input mt-1 block w-full" type="text" wire:model="name" placeholder="Gallery_name">
                </label>
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <textarea class="form-textarea mt-1 block w-full" rows="3" type="text" wire:model="description"
                              placeholder="description"></textarea>
                </label>
                @error('description')
                <span class="error">{{ $message }}</span>
                @enderror

                <button type="submit" class="mx-auto px-10 py-2 border-2 border-gray-400 ">Add Category</button>
                <button wire:click="cancel" class="btn btn-sm btn-outline-danger py-0">Cancel</button>
            </form>

        </div>
    @endif
</div>
