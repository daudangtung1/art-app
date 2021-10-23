<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use App\Models\GalleryInfo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Image;
use App\Models\ImageInfo;

class AdminGallery extends Component
{
    use WithFileUploads;
    public $thumb_name, $image, $description, $name, $data;
    public $updateMode = false;
    public $editMode = false;
    public $createMode = false;
    public $select_id;
    public $showItem = false;

    private function resetInput()
    {
        $this->thumb_name = null;
        $this->image = null;
        $this->name = null;
        $this->description = null;
    }

    public function cancel()
    {
        $this->createMode = false;
        $this->showItem = false;
        $this->editMode = false;
        $this->resetInput();
    }

    public function showItem()
    {
        $this->showItem = true;
    }

    public function editMode()
    {
        $this->editMode = false;
    }

    public function render()
    {
        $galleries = GalleryInfo::with('gallery')->paginate('10');
        return view('livewire.admin.gallery.index', [
            'galleries' => $galleries,
        ])->layout('layouts.admin');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function store()
    {
        $validate = $this->validate([
            'thumb_name' => 'required|max: 128',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        ]);

        $validateInfo = $this->validate([
            'name' => 'required| max: 128 ',
            'description' => 'required',
        ]);

        $file = $this->image->store('images', 'public');
        $validate['thumb_name'] = $file;
        $createFirst = Gallery::create($validate);

        $galleryInfo = new GalleryInfo();
        $galleryInfo->name = $this->name;
        $galleryInfo->description = $this->description;
        $galleryInfo->gallery_id = $createFirst->id;
        $galleryInfo->save();
        $this->createMode = false;
        $this->resetInput();
    }

    public function edit($id)
    {
        $edit = Gallery::findOrFail($id);
        $this->name = $edit->name;
        $this->description = $edit->description;
        $this->image = $edit->image;
        $this->select_id = $id;
        $this->editMode = true;
    }

    public function update()
    {
        $validate=$this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        ]);

        $validateInfo = $this->validate([
            'name' => 'required| max: 128 ',
            'description' => 'required'
        ]);

        $updateGallery = Gallery::find($this->select_id);

        $file = $this->image->store('images', 'public');
        $validate['thumb_name'] = $file;

        $updateGallery->galleryInfo()->update($validateInfo);
        $updateGallery->update($validate);

        $this->editMode = false;
        $this->resetInput();

    }

    public function delete($id)
    {
        GalleryInfo::where('gallery_id', '=', $id)->delete();
        Gallery::find($id)->delete();
        session()->flash('message', 'Users Deleted Successfully.');
    }
}
