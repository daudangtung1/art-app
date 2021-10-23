<div>
    <h1 class="uppercase py-6 border-b border-gray-200 text-center">Art app</h1>
    <div x-data="{active: 0}">
        <ul class="py-2 block">
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=0"
                x-bind:class="{'bg-green-200': active===0}">
                <a href="{{route('adminDashboard')}}" class="text-gray-600">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Dashboard</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=1"
                x-bind:class="{'bg-green-200': active===1}">
                <a href="{{route('adminGallery')}}" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Gallery</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=2"
                x-bind:class="{'bg-green-200': active===2}">
                <a href="{{route('adminImage')}}" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Image</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=3"
                x-bind:class="{'bg-green-200': active===3}">
                <a href="{{route('adminCategory')}}" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Category</p>
                </a>
            </li>

        </ul>
    </div>
</div>
