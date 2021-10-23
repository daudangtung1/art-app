<?php

namespace App\Http\Livewire\Admin;

use App\Models\ImageInfo;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithFileUploads;

class AdminImage extends Component
{
    use WithFileUploads;

    public $name, $alt, $description, $image, $title, $gallery_id;
    public $updateMode = false;
    public $createMode = false;
    public $select_id;

    private function resetInput()
    {
        $this->image = null;
        $this->name = null;
        $this->alt = null;
        $this->title = null;
        $this->description = null;
        $this->gallery_id = null;
    }

    public function cancel()
    {
        $this->createMode = false;
        $this->updateMode = false;
        $this->resetInput();
    }

    public function render()
    {
        $images = ImageInfo::with('image')->paginate('12');
        return view('livewire.admin.image.index', compact('images'))->layout('layouts.admin');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function store()
    {
        $validateImg = $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'gallery_id' => 'required',
        ]);
        $validateImgInfo = $this->validate([
            'title' => 'required|max: 128',
            'alt' => '',
            'description' => '',
        ]);
        $file = $this->image->store('images', 'public');
        $validateImg['name'] = $file;
        $validateImg['gallery_id'] = $this->gallery_id;
        $d = Image::create($validateImg);

        $imgInfo = new ImageInfo;
        $imgInfo->alt = $this->alt;
        $imgInfo->description = $this->description;
        $imgInfo->title = $this->title;
        $imgInfo->image_id = $d->id;
        $imgInfo->save();
        $this->createMode = false;
        $this->resetInput();
    }

    public function edit($id)
    {
        $edit = Image::findOrFail($id);
        $this->image = $edit->image;
        $this->updateMode = true;
        $this->select_id = $id;
    }

    public function update()
    {
        $val = $this->validate([
            'title' => 'required',
            'alt' => 'required',
            'description' => 'required',
        ]);

        $valImage = $this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'gallery_id' => 'required',
        ]);

        $update = Image::find($this->select_id);

        $file = $this->image->store('images', 'public');
        $valImage['name'] = $file;
        $valImage['gallery_id'] = $this->gallery_id;

        $update->imageInfo()->update($val);
        $update->update($valImage);

        $this->updateMode = false;
        $this->resetInput();
    }

    public function delete($id)
    {
        //test transaction
//        DB::beginTransaction();
//        try {
//            ImageInfo::where('image_id', '=', $id)->delete();
//            Image::find($id)->delete();
//            session()->flash('message', 'Users Deleted Successfully.');
//        } catch (Exception $e) {
//            DB::rollBack();
//            throw new Exception($e->getMessage());
//        }

        ImageInfo::where('image_id', '=', $id)->delete();
        Image::find($id)->delete();
        session()->flash('message', 'Users Deleted Successfully.');
    }

}
