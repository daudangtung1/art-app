<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>
    <div class="z-0 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($createMode==true)
            @include('livewire.admin.post.create')
        @endif
        {{--        @if($updateMode)--}}
        {{--            @include('livewire.admin.image.edit')--}}
        {{--        @endif--}}
        <nav class="container mx-auto flex justify-between">
            <button wire:click="create" class="btn btn-sm btn-outline-danger">Create</button>
            @if(Session::has('message'))
                <div class="bg-red-200 w-1/5 text-center py-1 px-6 flex justify-between" id="mess">
                    {{ Session::get('message') }}
                    <span class="cursor-pointer" onclick="this.parentElement.style.display='none';">&times;</span>
                </div>
            @endif
        </nav>
        @if($data==true)
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
                                        Title
                                    </th>
                                    <th class="p-8 text-xs text-gray-500">
                                        Content
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

                                @foreach($posts as $key => $post)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{--                                                                                {{$posts->firstItem() + $key  }}--}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            <p>{{$post->title}}</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            <p>{{$post->content}}</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            <p>{{$post->description}}</p>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">

                                        </td>
                                        {{--                                    <td class="px-6 py-4 text-center">--}}
                                        {{--                                        <button wire:click="edit({{$img->id}})"--}}
                                        {{--                                                class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit--}}
                                        {{--                                        </button>--}}
                                        {{--                                    </td>--}}
                                        {{--                                    <td class="px-6 py-4 text-center">--}}
                                        {{--                                        <button wire:click="delete({{$img->id}})"--}}
                                        {{--                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete--}}
                                        {{--                                        </button>--}}
                                        {{--                                    </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--                        {{ $images->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>
        @elseif($data==false)
            <livewire:admin.post.show :post="$slug"/>
        @endif
    </div>

</div>
