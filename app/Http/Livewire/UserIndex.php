<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public function render()
    {
        $users = Role::all();
        return view('livewire.user-index',  [
            'users' => $users
        ]);
    }
}
