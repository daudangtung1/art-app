<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Image;

class AdminCategory extends Component
{
    use WithFileUploads;
    public $thumb_name, $image, $description, $name, $data;
    public $updateMode = false;
    public $createMode = false;
    public $selected_id;
    public $showItem = false;

    public function render()
    {
        $cats = DB::table('categories')->paginate('8');
        return view('livewire.admin.category.index', compact('cats'))->layout('layouts.admin');
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
        $this->resetInput();
    }

    public function showItem()
    {
        $this->showItem = true;
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

    }

    public function update()
    {
        $validate = $this->validate([
            '' => '',
        ]);
        $this->resetInput();
        $this->createMode = false;
    }

    public function delete()
    {

    }

    public function showImage($id)
    {
        $this->showItem = true;
        $this->data=Image::with('category')->where('category_id', '=', $id);
        return view('livewire.admin.category.index');
    }
}
