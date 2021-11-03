<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;

class GalleryIndex extends Component
{

//    public $imageGet;
//    public function __construct(Image $imageGet)
//    {
//
//        $this->image=$imageGet;
//    }

    public function render()
    {
        return view('livewire.gallery', [
            'images'=>Image::all(),
        ])->layout('layouts.guest');

//        $imageData = $this->imageGet->getImageData();
//        return view('livewire.gallery', compact('imageData'));
    }
}
