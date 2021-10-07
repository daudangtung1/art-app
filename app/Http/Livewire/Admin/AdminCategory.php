<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Image;
use App\Models\ImageInfo;

class AdminCategory extends Component
{
    use WithFileUploads;
    public $thumb_name, $image, $description, $name, $data;
    public $updateMode = false;
    public $editMode = false;
    public $createMode = false;
    public $cat_id;
    public $showItem = false;

    public function render()
    {
        $cats = Category::with('item')->paginate('1');
        return view('livewire.admin.category.index', [
            'cats' => $cats,
        ])->layout('layouts.admin');
    }

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

    public function create()
    {
        $this->createMode = true;
    }

    public function store()
    {
        $validate = $this->validate([
            'thumb_name' => 'required|max: 128',
            'name' => 'required| max: 128 ',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'description' => ''
        ]);

        $file = $this->image->store('images', 'public');
        $validate['thumb_name'] = $file;
        $validate['name'] = $this->name;
        $validate['description'] = $this->description;

        Category::create($validate);

        $this->resetInput();
        $this->createMode = false;
    }

    public function edit($id)
    {
        $edit = Category::findOrFail($id);
        $this->name = $edit->name;
        $this->description = $edit->description;
        $this->image = $edit->image;
        $this->thumb_name = $edit->thumb_name;
        $this->cat_id = $id;
        $this->editMode = true;
    }

    public function update()
    {
        $validate = $this->validate([
            'thumb_name' => 'required|max: 128',
            'name' => 'required| max: 128 ',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif',
            'description' => 'required'
        ]);
        $updateCat = Category::find($this->cat_id);

        $file = $this->image->store('images', 'public');
        $validate['thumb_name'] = $file;

        $validate['name'] = $this->name;
        $validate['description'] = $this->description;

        $updateCat->update($validate);

        $this->editMode = false;
        $this->resetInput();

    }

    public function delete($id)
    {
        $del=Category::findOrFail($id);
        $checkData = Image::with('category')->where('category_id', '=', $id)->get();


       if(count($checkData)==0){
           $del->delete();
       }
       else{
           dd('can not delete!');
       }

    }

    public function detailCategory($id)
    {
        $this->showItem = true;
        $this->data = Image::with('category')->where('category_id', '=', $id)->get();
    }
}
