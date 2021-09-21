<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Gallery;
use App\Models\Image;
use App\Models\ImageInfo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;
use Illuminate\Support\Facades\DB;

class AdminGallery extends Component
{
    use WithFileUploads;

    public $name, $alt, $description, $image, $title;
    public $updateMode = false;
    public $createMode = false;
    public $select_id;

    public function render()
    {
        $imgs = ImageInfo::with('image')->paginate('12');
        return view('livewire.admin.admin-gallery', compact('imgs'))->layout('layouts.admin');
    }

    private function resetInput()
    {
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

        ]);
        $validateImgInfo = $this->validate([
            'title' => 'required|max: 128',
            'alt' => '',
            'description' => '',
        ]);
        $file = $this->image->store('images', 'public');
        $validateImg['name'] = $file;
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

//        $this->title = $edit->title;
//        $this->alt = $edit->alt;
//        $this->description = $edit->description;

        $this->updateMode = true;
        $this->select_id = $id;
    }

    public function update()
    {
        $val=$this->validate([
            'title'=>'required',
            'alt'=>'required',
            'description'=>'required',
        ]);

        $valImage=$this->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        ]);

        $update = Image::find($this->select_id);

        $file = $this->image->store('images', 'public');
        $valImage['name'] = $file;

        $update->imageInfo()->update($val);
        $update->update($valImage);

        $this->updateMode = false;
        $this->resetInput();
    }

    public function delete($id)
    {
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
