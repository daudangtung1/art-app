<div>
    <div class="bg-blue-100 z-20 fixed w-full">
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
                                    Image
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Alt
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Title
                                </th>
                                <th class="p-8 text-xs text-gray-500">
                                    Description
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">

                            @foreach($data as $key => $item)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        {{$data->firstItem() + $key  }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">
                                        <img src="{{ asset('storage/'.$item->name) }}" alt=""
                                             class="w-32 mx-auto">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <button wire:click="cancel">Close</button>
    </div>
</div>
