<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
//use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.user-index',  [
            'users' => $users
        ]);
    }
}
