<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Gallery;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminGallery extends Component
{
    use WithFileUploads;

    public $name, $alt, $description, $image, $title;
    public $updateMode = false;
    public $createMode = false;
    public $select_id;

    public function render()
    {
        return view('livewire.admin.admin-gallery', [
            'imgs' => Image::paginate('5'),
        ])->layout('layouts.admin');
    }

    private function resetInput(){
        $this->image = null;
        $this->name = null;
        $this->alt = null;
        $this->title = null;
        $this->description = null;
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function cancelCreate()
    {
        $this->createMode = false;
        $this->resetInput();
        $this->reset();
    }

    public function cancelUpdate()
    {
        $this->updateMode = false;
        $this->resetInput();
        $this->reset();
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
        $this->createMode = false;
        $this->resetInput();
    }

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

        $file = $this->image->store('images', 'public');
        $validateImg['name'] = $file;
        $validateImg['alt'] = $this->alt;
        $validateImg['description'] = $this->description;
        $validateImg['title'] = $this->title;
        Image::where('id', $this->select_id)->update($validateImg);
        $this->updateMode = false;
        $this->resetInput();
    }

    public function delete($id)
    {
        Image::find($id)->delete();
        session()->flash('message', 'Users Deleted Successfully.');
    }
}
