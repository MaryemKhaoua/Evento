<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ShowUsers()
    {
        $users = User::paginate(5);
        $roles = Role::all();

        return view('admin.users',compact('users', 'roles'));
    }

    public function BanUser($id)
    {
        $user = User::find($id);

        $user->status = 0;
        $user->save();

        return redirect()->back()->with('success', 'User Banned successfully!');
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::find($id);

        $user->role_id = $request->input('role');
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }
}