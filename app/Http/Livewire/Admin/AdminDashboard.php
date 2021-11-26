<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function mount($data)
    {
        $getPara = User::where('email', $data)->firstOrFail();
        return view('livewire.admin.admin-dashboard', compact($getPara));
    }

    //function render khong the add route parameter?

}
