<?php

namespace App\Http\Livewire\Admin;

use App\Models\ImageInfo;
use App\Models\Slug;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AdminImage extends Component
{
    use WithFileUploads;

    public $name, $alt, $description, $image, $title, $gallery_id, $slug, $image_id;
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

    protected $rules = [
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
        'gallery_id' => 'required',
    ];

    public function render()
    {
        $getUser = auth()->user();
        $images = Image::with('imageInfo')->paginate('12');
//        $galleries = Gallery::with('galleryItem')->where('user_id', '=', $getUser);
        $galleries = DB::table('galleries')
            ->join('gallery_infos', 'gallery_infos.id', '=', 'galleries.gallery_info_id')
            ->join('users', 'users.id', '=', 'galleries.user_id')
            ->where('galleries.user_id', '=', $getUser->id)
            ->select('galleries.id', 'gallery_infos.name')
            ->get();
        return view('livewire.admin.image.index', compact('images', 'galleries'))->layout('layouts.app');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function store()
    {
        $this->validate();

        $validateImgInfo = $this->validate([
            'title' => 'required|max: 128',
            'alt' => 'required|max: 128',
            'description' => 'required|max: 128',
        ]);

        $createInfo = ImageInfo::create($validateImgInfo);

        $createImage = new Image;
        $createImage->image = $this->image->store('images', 'public');
        $createImage->name = $this->name;
        $createImage->image_info_id = $createInfo->id;
        $createImage->gallery_id = $this->gallery_id;
        $createImage->save();

        $createSlug = new Slug;
        $createSlug->slug = $this->slug;
        $createSlug->image_id = $createImage->id;
        $createSlug->gallery_id = null;
        $createSlug->post_id = null;
        $createSlug->category_id = null;
        $createSlug->save();

        $this->createMode = false;
        $this->resetInput();
        session()->flash('message', 'Image gallery success.');
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
        $this->validate();
//        $valImage = $this->validate([
//            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
//            'gallery_id' => 'required',
//        ]);
        $validateInfo = $this->validate([
            'title' => 'required',
            'alt' => 'required',
            'description' => 'required',
        ]);

        $update = Image::find($this->select_id);

//        $valImage['name'] = $this->image->store('images', 'public');
//        $valImage['gallery_id'] = $this->gallery_id;

//        $update->imageInfo()->update($validateInfo);
//        $update->update($valImage);

        $update->image = $this->image->store('images', 'public');
        $update->gallery_id = $this->gallery_id;
        $update->imageInfo()->update($validateInfo);
        $update->save();

        $this->updateMode = false;
        $this->resetInput();
        session()->flash('message', 'Image Updated Successfully.');
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

        $d1 = Image::findOrFail($id);
        DB::table('image_infos')->where('image_infos.id', '=', $d1->image_info_id)->delete();
        $d1->delete();
        session()->flash('message', 'Image Deleted Successfully.');
    }

}
