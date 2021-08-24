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
    public $updateMode = false;

    public function render()
    {
        $imgs = Image::all();
        return view('livewire.admin.admin-gallery', compact('imgs'))->layout('layouts.admin');
    }

    public function store()
    {
        $validateImg = $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'name' => 'required|max:128',
            'title' => 'required|max: 128',
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

    public $select_id;

    public function edit($id)
    {
        $edit = Image::findOrFail($id);

        $this->image = $edit->image;
        $this->alt = $edit->alt;
        $this->description = $edit->description;
        $this->updateMode = true;
        $this->select_id = $id;
    }

    public function update()
    {
        $validateImg = $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'name' => 'required|max:128',
            'title' => 'required|max: 128',
            'alt' => '',
            'description' => '',
        ]);
        $update = Image::find($this->select_id);

//        $update->update([
//            'alt' => $this->alt,
//            'title' => $this->title,
//            'description' => $this->description,
//            'name' => $this->name,
//            'image' => $this->image->store('images', 'public'),
//        ]);

        $file = $this->image->store('images', 'public');
        $validateImg['name'] = $file;
        $validateImg['alt'] = $this->alt;
        $validateImg['description'] = $this->description;
        $validateImg['title'] = $this->title;
        Image::where('id', $this->select_id)->update($validateImg);
        $this->updateMode = false;
    }

    public function delete($id)
    {
        Image::find($id)->delete();
        session()->flash('message', 'Users Deleted Successfully.');
    }
}
