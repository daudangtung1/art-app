<div>
    <h1 class="uppercase py-6 border-b border-gray-200 text-center">Art app</h1>
    <div x-data="{active: 0}">
        <ul class="py-2 block">
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=0"
                x-bind:class="{'bg-green-200': active===0}">
                <a href="#" class="text-gray-600">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Dashboard</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=1"
                x-bind:class="{'bg-green-200': active===1}">
                <a href="#" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">User Profile</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=2"
                x-bind:class="{'bg-green-200': active===2}">
                <a href="#" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Table list</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=3"
                x-bind:class="{'bg-green-200': active===3}">
                <a href="#" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Typography</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=4"
                x-bind:class="{'bg-green-200': active===4}">
                <a href="" class="bg-green-200">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Maps</p>
                </a>
            </li>
            <li class="px-3 hover:bg-green-200" x-on:click.prevent="active=5"
                x-bind:class="{'bg-green-200': active===5}">
                <a href="" class="bg-green-200  ">
                    <p class="py-4 px-2 transition delay-150 ease-in-out">Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>
