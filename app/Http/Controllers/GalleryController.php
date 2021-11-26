<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Slug;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index(){
        $images=Image::with('imageSlug')->get();
        return view('pages.gallery.index', compact('images'));
    }

    public function mount($slug){
        $image=Slug::where('slug', $slug)->firstOrFail();
        return view('pages.gallery.show', compact('image'));
    }
}
