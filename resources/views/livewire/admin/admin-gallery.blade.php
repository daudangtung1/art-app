<div>
    @if(!$updateMode)
        @include('livewire.admin.create')
    @endif
    <div class="block">
        <div class="grid md:grid-cols-2 gap-1">
        @foreach($imgs as $img)
            <div class="flex justify-between">
                <img src="{{ asset('storage/'.$img->name) }}" alt="">
                <div>
                    <p>{{$img->title}}</p>
                    <p>{{$img->description}}</p>
                </div>
            </div>
        </div>
        <button wire:click="edit({{$img->id}})" class="btn btn-sm btn-outline-danger py-0">Edit</button>
        <button wire:click="delete({{$img->id}})" class="btn btn-sm btn-outline-danger py-0">Delete</button>
        @endforeach
    </div>
    @if($updateMode)
        @include('livewire.admin.edit')
    @endif
</div>
