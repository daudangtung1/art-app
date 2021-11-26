<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use App\Models\GalleryInfo;
use App\Models\Slug;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Image;
use App\Models\ImageInfo;
use function PHPUnit\Framework\isEmpty;

class AdminGallery extends Component
{
    use WithFileUploads;
    public $thumb_name, $image, $description, $name, $data;
    public $user_id;
    public $updateMode = false;
    public $editMode = false;
    public $createMode = false;
    public $select_id;
    public $showItem = false;
    public $user;
    public $showMode = false;

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

    public function showMode()
    {
        $this->showMode = true;
    }

    protected $rules = [
        'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
    ];

    public function render()
    {
        $getUser = auth()->user();
        $galleries = Gallery::with('galleryItem')->where('user_id', '=', $getUser->id)->paginate(10);
//        $galleries = DB::table('galleries')
//            ->join('users', 'users.id', '=', 'galleries.user_id')
//            ->join('gallery_infos', 'gallery_infos.id', '=', 'galleries.gallery_info_id')
//            ->select('galleries.*', 'gallery_infos.*', 'users.id')
//            ->where('galleries.user_id', '=', $getUser->id)
//            ->paginate(2);

        return view('livewire.admin.gallery.index', [
            'galleries' => $galleries,
        ])->layout('layouts.app');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function store()
    {
        $getUser = auth()->user();
        $this->validate();

        $validateInfo = $this->validate([
            'name' => 'required| max: 128 ',
            'description' => 'required',
        ]);

        $createInfo = GalleryInfo::create($validateInfo);

        $createGallery = new Gallery();
        $createGallery->image = $this->image->store('images', 'public');
        $createGallery->thumb_name = $this->thumb_name;
        $createGallery->gallery_info_id = $createInfo->id;
        $createGallery->user_id = $getUser->id;
        $createGallery->save();

        $this->createMode = false;
        $this->resetInput();
        session()->flash('message', 'Create gallery success.');
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
        $this->validate();
        $validateInfo = $this->validate([
            'name' => 'required| max: 128 ',
            'description' => 'required',
        ]);

        $update = Gallery::find($this->select_id);
        $update->image = $this->image->store('images', 'public');
        $update->galleryInfo()->update($validateInfo);
        $update->save();

        $this->editMode = false;
        $this->resetInput();
        session()->flash('message', 'Gallery Updated Successfully.');
    }

    public function delete($id)
    {
        $d1 = Gallery::find($id);
        GalleryInfo::with('gallery')->where('gallery_infos.id', '=', $d1->gallery_info_id)->delete();
        $d1->delete();
        session()->flash('message', 'Gallery Deleted Successfully.');
    }
}
