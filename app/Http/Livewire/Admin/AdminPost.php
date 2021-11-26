<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;
use App\Models\Slug;

class AdminPost extends Component
{
    public $createMode = false;
    public $data = true;
    public $title, $content, $description, $slug;

    private function resetInput()
    {
        $this->title = null;
        $this->content = null;
        $this->description = null;
        $this->slug = null;
    }

    public function render()
    {
//        $slug = Post::where('slug', $slug)->firstOrFail();
        $posts = Post::all();
        $this->data = true;
        return view('livewire.admin.post.index', compact('posts'))->layout('layouts.app');
    }

    public function create()
    {
        $this->createMode = true;
        $this->data = false;
    }

//    public function mount($slug)
//    {
//        $slug = Slug::where('slug', $slug)->firstOrFail();
//        $this->data=false;
//        return view('livewire.admin.post.show', compact('slug'));
//    }

    public function store()
    {
        $validate = $this->validate([
            'title' => 'required|max:128',
            'description' => 'required',
            'content' => 'required'
        ]);
        $createPost = Post::create($validate);

        $createSlug = new Slug;
        $createSlug->slug = $this->slug;
        $createSlug->post_id = $createPost->id;
        $createSlug->save();

        $this->createMode = false;
        $this->resetInput();
        session()->flash('message', 'Post created success!');
    }
}
