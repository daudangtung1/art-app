<div>
    <div class="z-0">
        @if($createMode==true)
            @include('livewire.admin.category.create')
        @endif
        @if($showItem==true)
            @include('livewire.admin.category.show')
        @endif
        <nav class="container mx-auto">
            <button wire:click="create" class="btn btn-sm btn-outline-danger py-0">Create</button>
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
                                    Category
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
                            @foreach($cats as $key=>$cat)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{$cats->firstItem() + $key  }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <button wire:click="showImage({{$cat->id}})" class="hover:text-gray-700">{{$cat->name}}</button>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <img src="{{ asset('storage/'.$cat->thumb_name) }}" alt=""
                                             class="w-32 mx-auto">
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-500">

                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <p>{{$cat->description}}</p>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button wire:click=""
                                                class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <button wire:click=""
                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $cats->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
