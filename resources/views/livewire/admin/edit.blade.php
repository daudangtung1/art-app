<div>
    <form wire:submit.prevent="update" class="block" wire::model="select_id">
        <input type="file" wire:model="image">
        @error('image')
        <span class="error">{{ $message }}</span>
        @enderror
        <input type="text" wire:model="name" placeholder="name">
        @error('name')
        <span class="error">{{ $message }}</span>
        @enderror
        <input type="text" wire:model="title" placeholder="title">
        @error('title')
        <span class="error">{{ $message }}</span>
        @enderror
        <input type="text" wire:model="alt" placeholder="alt">
        <input type="text" wire:model="description" placeholder="description">
        <button type="submit">Save Photo</button>
    </form>
</div>
