<div>
    <nav class="flex justify-between py-6">
        <div>
            <h2>Dashboard</h2>
        </div>
        <div x-data="{ open: false }">
            <form class="relative">
                <input type="text" placeholder="Search..." class="focus:outline-none bg-transparent py-2 pr-14 relative w-64" @click="open=true">
                <button type="button" class="z-10 bg-white h-10 w-10 rounded-full absolute right-2">o</button>
                <div x-show="open" @click.away="open=false">
                    <span class="absolute bottom-0 w-4/5 h-px bg-red-700"></span>
                </div>
            </form>
        </div>
    </nav>
</div>
