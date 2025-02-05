<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AlluserController extends Controller
{
    //All users page 
    public function index()
    {
        //Fetch All users where Role is Employee(0)
        $users = User::where('role', 0)->paginate(5);

        //Count All User
        $totalusers = User::where('role', 0)->count();

        return view(
            'pages.admin.all-users',
            [
                'users' => $users,
                'totalusers' => $totalusers
            ]
        );
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ]);


        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.addUser')->with('status', 'New user added successfully.');
    }

    public function edit(User $user)
    {
        $users = User::find($user);

        return view('pages.admin.edit', ['users' => $users]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        // dd($user);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        return redirect()->route('admin.allUser')->with('update','User updated successfully.');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.allUser')->with('status', 'User deleted successfully..');
    }
}