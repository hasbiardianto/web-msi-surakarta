<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index() {
        $users = User::orderBy('role')->paginate(10);
        return view("admin.users", [
            'users' => $users,
        ]);
    }

    public function grantAdmin(Request $request , User $user) {
        $user->findOrFail($request->id)->update([
            'role' => 'admin',
        ]);
        return redirect()->route('users.view');
    }
}
