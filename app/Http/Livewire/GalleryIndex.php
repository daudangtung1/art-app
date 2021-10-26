<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Livewire\Component;

class GalleryIndex extends Component
{
    public function render()
    {
        return view('livewire.gallery', [
            'images'=>Image::all(),
        ])->layout('layouts.guest');
    }
}
