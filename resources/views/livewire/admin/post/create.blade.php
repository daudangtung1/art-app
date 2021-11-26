<div>
    @if($createMode)
        <div class="bg-blue-100 z-20 fixed w-full">
            <form wire:submit.prevent="store" class="container mx-auto">
                <label class="block">
                    <span class="text-gray-700">Name</span>
                    <input class="form-input mt-1 block w-full" type="text" wire:model="title" placeholder="title">
                </label>
                @error('title')
                <span class="error">{{ $message }}</span>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Slug</span>
                    <input class="form-input mt-1 block w-full" type="text" wire:model="slug" placeholder="Slug">
                </label>
                @error('slug')
                <span class="error">{{ $message }}</span>
                @enderror


                <label class="block">
                    <span class="text-gray-700">Description</span>
                    <textarea class="form-input mt-1 block w-full" type="text" wire:model="description" rows="4" placeholder="Description..."></textarea>
                </label>
                @error('description')
                <span class="error">{{ $message }}</span>
                @enderror

                <label class="block">
                    <span class="text-gray-700">Content</span>
                    <textarea class="form-input mt-1 block w-full" type="text" wire:model="content" rows="10" placeholder="Content..."></textarea>
                </label>
                @error('content')
                <span class="error">{{ $message }}</span>
                @enderror


                <button type="submit" class="mx-auto px-10 py-2 border-2 border-gray-400 ">Save Photo</button>
{{--                <button wire:click="cancel" class="btn btn-sm btn-outline-danger py-0">Cancel</button>--}}
            </form>

        </div>
    @endif
</div>
