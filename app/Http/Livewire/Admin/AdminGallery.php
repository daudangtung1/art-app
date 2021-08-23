<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Gallery;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;


class AdminGallery extends Component
{
    use WithFileUploads;

    public $name, $alt, $description, $image, $title;

    public function render()
    {
        $imgs=Image::all();
        return view('livewire.admin.admin-gallery', compact('imgs'))->layout('layouts.admin');
    }

    public function store()
    {
        $validateImg = $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'name' => 'required|max:128',
            'title' =>'required|max: 128',
            'alt' => '',
            'description' => '',
        ]);
        $file = $this->image->store('images', 'public');
        $validateImg['name'] = $file;
        $validateImg['alt'] = $this->alt;
        $validateImg['description'] = $this->description;
        $validateImg['title'] = $this->title;
        Image::create($validateImg);
    }

}
