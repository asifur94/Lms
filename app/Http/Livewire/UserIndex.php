<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
//use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    // public function render()
    // {
    //     $users = User::where('name', '!=', 'Super Admin')->get();
    //     return view('livewire.user-index',  [
    //         'users' => $users
    //     ]);

    //     User::with('roles')->paginate();
    //}
    public function render()
    {
        $users = User::with('roles')->paginate(10);
        return view('livewire.user-index',['users' => $users]);
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        flash()->addSuccess('User deleted successfully!');
        return redirect()->route('user.index');
    }
}
