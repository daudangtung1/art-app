<div class="fixed top-0 left-0 right-0 background -z-50" style="background-image: url('img/wallpaper1.jpg');
	height: 100vh;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size: cover;
"></div>
<div class="px-20 mt-72 mb-0 text-white flex">
    <div>
        <img src="img/wallpaper2.jpg" alt="" class="w-28 h-28">
    </div>
    <div class="ml-4">
        <div class="mb-2">
            <h1 class="text-4xl font-semibold leading-7 mb-2">Dau Dang Tung</h1>
        </div>
        <div class="mb-2">
            <h2 class="text-2xl">Enviroment Artist</h2>
        </div>
        <div class="mb-2">
            <span class="border-r pr-4">59.1K Watcher</span>
            <span class="border-r px-4">1.5M Page Views</span>
            <span class="border-r px-4">408 Deviations</span>
            <span class="border-r px-4">5,7K Comments</span>
            <span class="border-r px-4">1,3K Favourites</span>
        </div>
    </div>
</div>
<nav class="mt-10 flex justify-between bg-black mx-20">
    <ul>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">Home</a></li>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">Gallery</a></li>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">Favourite</a></li>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">Posts</a></li>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">Shop</a></li>
        <li class="inline-block px-4 py-3"><a href="#" class="hover:text-white px-4 py-3 text-gray-83">About</a></li>
    </ul>
    <div class="sub-nav text-white flex">
        <div class="mr-3">
            <button type="button" class="px-3 py-3 text-xl"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
            <button type="button" class="px-3 py-3 text-xl"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>
            <button type="button" class="px-3 py-3 text-xl"><i class="fa fa-gift" aria-hidden="true"></i></button>
        </div>
        <button class="px-10 py-3 bg-white hover:text-green-400 text-black">Chat</button>
        <button class="px-10 py-3 bg-green-400 text-black">+ Watch</button>
    </div>
</nav>
<div class="pb-90 text-white bg-black">
    <div class="main-background">
        <div class="px-20 mb-10">
            <div class="gallery-nav pt-4 pb-3 flex justify-between">
                <h4 class="text-xl font-medium">Gallery</h4>
                <form class="relative">
                    <div>
                        <input type="text" placeholder="What are you loocking for?"
                               class="focus:outline-none text-black px-3 py-1 w-64 border-green-400 border-2">
                    </div>
                    <button type="button" class="absolute hover:cursor-pointer">x</button>
                </form>
            </div>
            <div>
                <div class="owl-carousel owl-theme owl-loaded">
                    <div class="gallery-category">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                <div class="owl-item">
                                    <a href="#" class="color-white">
                                        <div class="p-4 hover:bg-gray-83">
                                            <div class="pb-4 h-44">
                                                <img src="img/wallpaper6.jpg" alt="" class="h-full object-cover">
                                            </div>
                                            <div>
                                                <h5 class="mb-2">All</h5>
                                                <h6>395 deviations</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-20">
            <div class="pt-4 pb-3 flex">
                <h4 class="text-xl font-medium">Featured</h4> <span class="ml-2 text-xl"> {{count($images)}} </span>
            </div>
            <div id="my-gallery" style="margin: 0 -0.5rem">
                @foreach($images as $img)
                    <a href="">
                        <img alt="{{$img->alt}}" src="{{ asset('storage/'.$img->name) }}"/>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
