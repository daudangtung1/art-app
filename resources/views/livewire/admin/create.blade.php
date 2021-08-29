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
                    <span class="text-gray-700">Name</span>
                    <input class="form-input mt-1 block w-full" type="text" wire:model="name" placeholder="name">
                </label>
                @error('name')
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
                <button type="submit" class="mx-auto px-10 py-2 border-2 border-gray-400 ">Save Photo</button>
            </form>
            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
        </div>
    @endif
</div>

