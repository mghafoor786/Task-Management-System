<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //All-User page
    public function allUser()
    {

        //Fetch All users where Role is Employee(0)
        $users = User::where('role', 0)->get();

        //Fetch All users where Role is Employee Count
        $totalusers = User::where('role', 0)->count();

        return view('pages.admin.all-users',
         [
            'users' => $users,
            'totalusers'=>$totalusers
        ]);
    }

    //Add-User page
    public function addUser()
    {
        return view('pages.admin.add-user');
    }

    
    public function add(Request $request)
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

        return redirect()->route('admin.addUser')->with('status','New user added successfully.');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('admin.allUser');
    }

    public function edit(User $user)
    {
        $users = User::find($user);

        return view('pages.edit', ['users' => $users]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email_name' => $request->email,
            'username' => $request->username,

        ]);
        return redirect()->route('admin.allUser');
    }
}

