<div>
    <div class="bg-blue-100 z-20 fixed w-full h-full">
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
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">

                            @foreach($data as $imgs)
                                <p>{{$imgs->name}}</p>
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
