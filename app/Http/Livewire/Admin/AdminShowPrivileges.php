<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminShowPrivileges extends Component
{
    use WithPagination;
    public function editUser($user_id,$type){
        $user = User::find($user_id);
        $user->utype = $type;
        $user->save();
        session()->flash('user_changed' , 'User Changed successfully');
    }
    public function deleteUser($user_id){
        $user = User::find($user_id);
        $user->delete();
        session()->flash('user_deleted' , 'User deleted successfully');
    }
    public function render()
    {
        $users = User::where('utype','USR')->paginate(10);
        $admins = User::where('utype','ADM')->paginate(10);
        return view('livewire.admin.admin-show-privileges',['users'=>$users,'admins'=>$admins])->layout('layouts.base');
    }
}
