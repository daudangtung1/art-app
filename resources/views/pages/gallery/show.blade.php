@extends('layouts.pages')
@section('main-pages')
    <div class="fixed top-0 left-0 right-0 background -z-50" style="background-image: url('{{asset('img/wallpaper1.jpg')}}');
	height: 100vh;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: center;
	background-size: cover;
"></div>
    <div class="px-20 mt-72 mb-16 mb-0 text-white flex">
        <div>
            <img src="{{asset('img/wallpaper2.jpg')}}" alt="" class="w-28 h-28">
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
    <nav class="header-nav bg-black flex justify-between mx-16 z-20">
        <ul>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Home</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Gallery</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Favourite</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Posts</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Shop</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">About</a></li>
            <li class="inline-block px-4 py-3"><a href="" class="text-white px-4 py-3">Subscriptions</a></li>
        </ul>
        <div class="sub-nav text-white flex">
            <div class="mr-3 flex">
                <button type="button" class="px-3 py-3 text-xl block"><i class="fa fa-ellipsis-h"
                                                                         aria-hidden="true"></i></button>
                <button type="button" class="px-3 py-3 text-xl 2xl:block xl:hidden lg:hidden md:hidden"><i
                        class="fa fa-share-square-o" aria-hidden="true"></i></button>
                <button type="button" class="px-3 py-3 text-xl 2xl:block xl:hidden lg:hidden md:hidden"><i
                        class="fa fa-gift" aria-hidden="true"></i></button>
            </div>
            <button type="button" class="px-10 py-3 bg-white text-black 2xl:block xl:hidden lg:hidden md:hidden">Chat
            </button>
            <div class="px-10 py-3 bg-green-400"><a href="" class="text-black">+ Watch</a></div>
        </div>
    </nav>
    <div class="pb-90 text-white bg-black mt-6">
        <div class="main-background">
            <div class="px-20 mb-10">
                <div class="gallery-nav pt-4 pb-3 flex justify-between z-10">
                    <h4 class="text-xl font-medium">Gallery</h4>
                    <button class="btn-search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <form class="form-search hidden">
                        <div class="border border-green-400 w-56 pl-2 pr-1 py-1 p bg-black text-sm">
                            <input type="text" class="focus:outline-none bg-black text-white w-48"
                                   placeholder="What are you loocking for?">
                            <button class="close-search text-white" type="button">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="px-20">
                <img src="{{ asset('storage/'.$image->slugImage->image) }}" alt="{{$image->slugImage->imageInfo->alt}}">
            </div>
        </div>
    </div>
@endsection
