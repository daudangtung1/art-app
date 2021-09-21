<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Gender extends Component
{
    public function render()
    {
        return view('livewire.gender', [
            'gender'=>\App\Models\Gender::all(),
        ]);
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['gender'] = $value;
    }
}
