<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galleries') }}
        </h2>
    </x-slot>
    <div class="z-0 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($createMode==true)
            @include('livewire.admin.category.create')
        @endif
        @if($showItem==true)
            @include('livewire.admin.category.show')
        @endif
        @if($editMode==true)
            @include('livewire.admin.category.edit')
        @endif
        <nav class="container mx-auto flex justify-between">
            <button wire:click="create" class="btn btn-sm btn-outline-danger">Create</button>
            @if(Session::has('message'))
                <div class="bg-red-200 w-1/5 text-center py-1 px-6 flex justify-between" id="mess">
                    {{ Session::get('message') }}
                    <span class="cursor-pointer" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif
        </nav>

        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    <div class="p-4 border-b border-gray-200 shadow">
                        <!-- <table> -->
                        <table id="dataTable" class="p-4 w-full">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="p-8 text-xs text-gray-500">
                                    ID
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Name
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Image
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Img(s)
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Description
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">

                            @foreach($galleries as $key=>$cat)

                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
{{--                                        {{$galleries->firstItem() + $key  }}--}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <button wire:click="detailCategory({{$cat->id}})"
                                                class="hover:text-gray-700">{{$cat->galleryInfo->name}}</button>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <img src="{{ asset('storage/'.$cat->image) }}" alt=""
                                             class="w-32 mx-auto">
                                    </td>

                                    <td class="px-6 py-4 text-center text-sm text-gray-500">
                                        <p>{{count($cat->galleryItem)}}</p>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <p>{{$cat->galleryInfo->description}}</p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button wire:click="edit({{$cat->id}})"
                                                class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button wire:click="delete({{$cat->id}})"
                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $galleries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
